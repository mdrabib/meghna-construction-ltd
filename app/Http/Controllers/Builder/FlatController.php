<?php

namespace App\Http\Controllers\Builder;


use App\Http\Controllers\Controller;
use App\Models\Builder\Flat;
use Illuminate\Http\Request;
use Exception;


class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats=Flat::paginate(10);
        return view('flat.index',compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Flat.create');
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
            $flats=new Flat();
            $identity = decrypt(session()->get('roleIdentity'));
            
            $flats->created_by=decrypt(session()->get('userId'));
            $flats->flat=$request->flatname;
            
            $flats->status = 1;
            if($flats->save()){
                return redirect($identity.'/flat')->with('success','Data saved');
            }
        }
        catch(Exception $e){
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Builder\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Builder\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        return view ('flat.edit',compact('flat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Builder\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
       
        try{
             $identity = decrypt(session()->get('roleIdentity'));
            $user = decrypt(session()->get('userId'));
            $flats=$flat;
            $flats->flat=$request->flatname;
            $flats->updated_by = $user;
            // $builder->builder=$request->buildername;
            $flats->status = 1;
            if($flats->save()){
                return redirect($identity.'/flat')->with('success','Data saved');
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
     * @param  \App\Models\Builder\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        $flat->delete();
        return redirect()->route('flat.index');
    }
}


