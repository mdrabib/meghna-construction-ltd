<?php

namespace App\Http\Controllers\Lands;

use App\Http\Controllers\Controller;
use App\Models\Lands\Land;
use Exception;
use Illuminate\Http\Request;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lands=Land::paginate(10);
        return view('Projects.Lands.index',compact('Lands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Projects.Lands.create');
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
            $land= new Land();
            $identity = decrypt(session()->get('roleIdentity'));
            $land->squire_feet = $request->squireFeet;
            $land->house_no = $request->houseNo;
            $land->block = $request->block;
            $land->road_no = $request->roadNo;
            $land->address = $request->address;
            if($request->hasFile('designId')){
                $imageName = rand(111,999).time().'.'.$request->designId->extension();  
                $request->designId->move(public_path('uploads/land'), $imageName);
                $land->design_id = $imageName;
            }

            $land->total_budget = $request->totalBudget;
            $land->total_cost = $request->totalCost; 

            $land->status = 1;
            if($land->save()){
                return redirect($identity.'/land')->with('success','Data saved');
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
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show(Land $land)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        return view('Projects.Lands.edit',compact('land'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Land $land)
    {
        try{
            $identity = decrypt(session()->get('roleIdentity'));
            $lands= $land;
            $land->plot_area_counter = $request->squireFeet;
            $land->house_no = $request->houseNo;
            $land->block = $request->block;
            $land->road_no = $request->roadNo;
            $land->address = $request->address;

            if($request->hasFile('designId')){
                $imageName = rand(111,999).time().'.'.$request->designId->extension();  
                $request->designId->move(public_path('uploads/land'), $imageName);
                $land->design_id = $imageName;
            }
            $land->total_budget = $request->totalBudget;
            $land->total_cost = $request->totalCost;

            if($lands->save()){
                return redirect($identity.'/land')->with('success','Data saved');
            }
        }
        catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function destroy(Land $land)
    {
        $land->delete();
        return redirect()->back();
    }
}
