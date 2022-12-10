<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\BuilderOption;
use Illuminate\Http\Request;
use Exception;

class BuilderOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builders=BuilderOption::paginate(10);
        return view('Builder.index',compact('builders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Builder.create');  
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
            $builder=new BuilderOption();
            $identity = decrypt(session()->get('roleIdentity'));
            
            $builder->created_by=decrypt(session()->get('userId'));
            $builder->name=$request->buildername;
           
            
            $builder->status = 1;
            if($builder->save()){
                return redirect($identity.'/builder')->with('success','Data saved');
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
     * @param  \App\Models\Builder\BuilderOption  $builderOption
     * @return \Illuminate\Http\Response
     */
    public function show(BuilderOption $builderOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Builder\BuilderOption  $builderOption
     * @return \Illuminate\Http\Response
     */
    public function edit(BuilderOption $builder)
    {
        return view ('Builder.edit',compact('builder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Builder\BuilderOption  $builderOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuilderOption $builder)
    {
        
        $identity = decrypt(session()->get('roleIdentity'));
        $user = decrypt(session()->get('userId'));
        try{
            $builder->name = $request->buildername;
            $builder->updated_by = $user;
            // $builder->builder=$request->buildername;
            $builder->status = 1;
            if($builder->save()){
                return redirect($identity.'/builder')->with('success','Data saved');
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
     * @param  \App\Models\Builder\BuilderOption  $builderOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuilderOption $builder)
    {
        $builder->delete();
        return redirect()->route('builder.index');
    }
}
