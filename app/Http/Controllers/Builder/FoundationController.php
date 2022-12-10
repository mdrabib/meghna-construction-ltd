<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Models\Builder\Foundation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FoundationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foundations = Foundation::paginate(10);
        return view('foundation.index',compact('foundations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foundation.create');
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
            $foundation = new Foundation();
            $foundation->height = $request->height;
            $foundation->weight = $request->weight;
            $foundation->piler_name = $request->piles;
            $foundation->rode_size = $request->rodsize;

            $foundation->status = 1;
            $foundation->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));

            if($foundation->save()){
                return redirect($identity.'/foundation')->with('success','Data saved');
            }
        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function show(Foundation $foundation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function edit(Foundation $foundation)
    {
        return view('foundation.edit',compact('foundation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foundation $foundation)
    {
        try{
            $foundations = $foundation;
            $foundations->height = $request->height;
            $foundations->weight = $request->weight;
            $foundations->piler_name = $request->piles;
            $foundations->rode_size = $request->rodsize;

            $foundations->status = 1;
            $foundations->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));

            if($foundations->save()){
                return redirect($identity.'/foundation')->with('success','Data saved');
            }
        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foundation $foundation)
    {
        $foundation->delete();
        return redirect()->back();
    }
}
