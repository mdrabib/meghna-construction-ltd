<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\FloorBudget;
use App\Models\Builder\FloorDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FloorbudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floorbudget= FloorBudget::paginate(10);
        return view('floorBudget.index',compact('floorbudget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floorbudget=FloorDetails::paginate(10);
        return view('floorBudget.create',compact('floorbudget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $floorbudget=new FloorBudget();
            $identity = decrypt(session()->get('roleIdentity'));
            $floorbudget->floor_details_id = $request->floorNo;
            $floorbudget->Total_working_day = $request->tworkingday;
            $floorbudget->Total_worker = $request->tworker;
            $floorbudget->issues_date = $request->issueDate;

            $floorbudget->created_by=Crypt::decrypt(session()->get('userId'));
            $floorbudget->status = 1;
            if($floorbudget->save()){
                return redirect($identity.'/floorBudget')->with('success','Data saved');
            }
        }
        catch(Exception $error){
            dd($error);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Builder\Floorbudget  $floorbudget
     * @return \Illuminate\Http\Response
     */
    public function show(Floorbudget $floorbudget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Builder\Floorbudget  $floorbudget
     * @return \Illuminate\Http\Response
     */
    public function edit(Floorbudget $floorBudget)
    {
        $fbudgets=FloorDetails::all();
        return view('floorBudget.edit',compact('floorBudget','fbudgets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Builder\Floorbudget  $floorbudget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floorbudget $floorBudget)
    {
        try{
            $floorbudget = $floorBudget;
            $identity = decrypt(session()->get('roleIdentity'));
            $floorbudget->floor_details_id = $request->floorNo;
            $floorbudget->Total_working_day = $request->tworkingday;
            $floorbudget->Total_worker = $request->tworker;
            $floorbudget->issues_date = $request->issueDate;

            $floorbudget->updated_by=Crypt::decrypt(session()->get('userId'));
            $floorbudget->status = 1;
            if($floorbudget->save()){
                return redirect($identity.'/floorBudget')->with('success','Data saved');
            }
        }
        catch(Exception $error){
            dd($error);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Builder\Floorbudget  $floorbudget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floorbudget $floorBudget)
    {
        $floorBudget->delete();
        return redirect()->back();
    }
}
