<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\BudgetDetails;
use App\Models\Builder\FloorDetails;
use App\Models\Builder\Unit;
use App\Models\Projects\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BudgetDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BudgetDetails= BudgetDetails::paginate(10);
        return view('BudgetDetails.index',compact('BudgetDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildingName = Project::all();
        $floorNo = FloorDetails::all();
        $unitName = Unit::all();
        return view('BudgetDetails.create',compact('buildingName', 'floorNo', 'unitName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response
     * {{-- project_id(building_name) floor_details_id(floor_no) material_id  budget_quantity market_price 	total_budget 	issues_date  (material_name)--}}
     */
    public function store(Request $request)
    {
        try{
            $fBDetails = new BudgetDetails();
            $fBDetails->project_id = $request->buildingName;
            $fBDetails->floor_details_id = $request->floorNo;
            $fBDetails->units_id = $request->unitName;
            $fBDetails->budget_quantity = $request->quantity;
            $fBDetails->market_price = $request->mPrice;
            $fBDetails->total_budget = $request->quantity * $request->mPrice;
            // $fBDetails->issues_date = $request->issueDate;

            $fBDetails->status = 1;
            $fBDetails->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));
            if($fBDetails->save()){
                return redirect($identity.'/floorBudgetDetail')->with('success', 'Data saved');
            }

        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BudgetDetails  $BudgetDetails
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetDetails $BudgetDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetDetails  $BudgetDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetDetails $floorBudgetDetail)
    {
        $buildingName = Project::all();
        $floorNo = FloorDetails::all();
        $unitName = Unit::all();
        return view('BudgetDetails.edit',compact('floorBudgetDetail','buildingName', 'floorNo', 'unitName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetDetails  $BudgetDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetDetails $floorBudgetDetail)
    {
        try{
            $fBDetails = $floorBudgetDetail;
            $fBDetails->project_id = $request->buildingName;
            $fBDetails->floor_details_id = $request->floorNo;
            $fBDetails->units_id = $request->unitName;
            $fBDetails->budget_quantity = $request->quantity;
            $fBDetails->market_price = $request->mPrice;
            $fBDetails->total_budget = $request->quantity * $request->mPrice;
            // $fBDetails->issues_date = $request->issueDate;

            $fBDetails->status = 1;
            $fBDetails->updated_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));
            if($fBDetails->save()){
                return redirect($identity.'/floorBudgetDetail')->with('success', 'Data saved');
            }

        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetDetails  $BudgetDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetDetails $floorBudgetDetail)
    {
        $floorBudgetDetail->delete();
        return redirect()->back();
    }
}
