<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\Material;
use App\Models\Builder\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials=Material::paginate(10);
        return view('material.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitname = Unit::all();
        return view('material.create',compact('unitname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * unit_id 	brand 	unit 	per_unit_price 	note
     */
    public function store(Request $request)
    {
        try{
            $material = new Material();
            $material->unit_id = $request->unitName;
            $material->brand = $request->brandName;
            $material->unit = $request->unit;
            $material->per_unit_price = $request->perunitprice;
            $material->note = $request->note;

            $material->status = 1;
            $material->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));

            if($material->save()){
                return redirect($identity.'/material')->with('success','Data saved');
            }
        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $unitname = Unit::all();
        return view('material.edit',compact('material','unitname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        try{
            $material = $material;
            $material->unit_id = $request->uname;
            $material->brand = $request->brand;
            $material->unit = $request->unit;
            $material->per_unit_price = $request->perunitprice;
            $material->note = $request->note;

            $material->status = 1;
            $material->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));

            if($material->save()){
                return redirect($identity.'/material')->with('success','Data saved');
            }
        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->back();
    }
}
