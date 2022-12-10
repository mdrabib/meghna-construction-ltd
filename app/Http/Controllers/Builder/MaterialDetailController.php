<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\MaterialDetail;
use App\Models\Builder\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MaterialDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialDetail=MaterialDetail::paginate(10);
        return view('materialDetails.index',compact('materialDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matName = Unit::all();
        return view('materialDetails.create',compact('matName'));
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
            $materialDetail=new MaterialDetail();
            $identity = decrypt(session()->get('roleIdentity'));
            $materialDetail->material_id=$request->materialName;
            $materialDetail->brand_name = $request->brandName;
            $materialDetail->quantity = $request->quantity;
            $materialDetail->cost_per_items = $request->costPerItems;

            if($request->hasFile('voucherImage')){
                $imageName = rand(111,999).time().'.'.$request->voucherImage->extension();  
                $request->voucherImage->move(public_path('uploads/materialVoucher'), $imageName);
                $materialDetail->voucher_image=$imageName;
            }
            $materialDetail->created_by=Crypt::decrypt(session()->get('userId'));
            $materialDetail->status = 1;
            if($materialDetail->save()){
                return redirect($identity.'/materialDetails')->with('success','Data saved');
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
     * @param  \App\Models\MaterialDetail  $materialDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialDetail $materialDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialDetail  $materialDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialDetail $materialDetail)
    {
        $matName=Unit::all();
        return view('materialDetails.edit',compact('materialDetail','matName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialDetail  $materialDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialDetail $materialDetail)
    {
        try{
            $mDetail = $materialDetail;
            $identity = decrypt(session()->get('roleIdentity'));
            $mDetail->material_id=$request->materialName;
            $mDetail->brand_name = $request->brandName;
            $mDetail->quantity = $request->quantity;
            $mDetail->cost_per_items = $request->costPerItems;

            if($request->hasFile('voucherImage')){
                $imageName = rand(111,999).time().'.'.$request->voucherImage->extension();  
                $request->voucherImage->move(public_path('uploads/materialVoucher'), $imageName);
                $materialDetail->voucher_image=$imageName;
            }
            $mDetail->updated_by=Crypt::decrypt(session()->get('userId'));
            if($mDetail->save()){
                return redirect($identity.'/materialDetails')->with('success','Data saved');
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
     * @param  \App\Models\MaterialDetail  $materialDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialDetail $materialDetail)
    {
        $materialDetail->delete();
        return redirect()->back();
    }
}
