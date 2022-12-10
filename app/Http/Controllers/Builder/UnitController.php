<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::paginate(10);
        return view('unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
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
            // squire_feet 	total_cost 	floor_budget_id 	material_detail_id 	sales_price 
            $unit=new Unit();
            $identity = decrypt(session()->get('roleIdentity'));
            $unit->name = $request->name;
            $unit->quantity = $request->quantity;
            $unit->quantity_name = $request->qname;

            $unit->created_by=Crypt::decrypt(session()->get('userId'));
            $unit->status = 1;
            if($unit->save()){
                return redirect($identity.'/unit')->with('success','Data saved');
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
     * @param  \App\Models\Builder\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Builder\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Builder\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        try{
            $unit = $unit;
            $identity = decrypt(session()->get('roleIdentity'));
            $unit->name = $request->name;
            $unit->quantity = $request->quantity;
            $unit->quantity_name = $request->qname;

            $unit->updated_by=Crypt::decrypt(session()->get('userId'));
            if($unit->save()){
                return redirect($identity.'/unit')->with('success','Data saved');
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
     * @param  \App\Models\Builder\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->back();
    }
}
