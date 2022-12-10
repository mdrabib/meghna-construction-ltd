<?php

namespace App\Http\Controllers\Builder;

use App\Models\Builder\Design;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Exception;
use Illuminate\Http\Request;


class DesignController extends Controller
{
    // public function __invoke(Request $request,$id)
    // {
        
    //     $employee = User::where('role_id',3)->get();
    //     return view('Design.create',compact(['id','employee']));      
        
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $employee = User::where('role_id',3)->get();
        return view('Projects.Design.create',compact(['id','employee']));      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employee = User::where('role_id',3)->get();
        return view('Projects.Design.create',compact(['id','employee']));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredesignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = decrypt($request->project);
        try{
            $design=new Design;
            $identity = decrypt(session()->get('roleIdentity'));
            $design->designer_id=$request->desiname;
            if($request->hasFile('document')){
                $imageName = rand(111,999).time().'.'.$request->document->extension();  
                $request->document->move(public_path('uploads/design'), $imageName);
                $design->document = $imageName;
            }
            $design->building_squire_feet=$request->bsfeet;
            $design->total_floor_number=$request->tfnumber;
            $design->design_details=$request->designdetails;
            $design->project_id= $project;
            $design->created_by=decrypt(session()->get('userId'));
            
            $design->status = 1;
            if($design->save()){
                return redirect(route('project.show',$project))->with('success','Data saved');
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
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // print_r($id);
        $designDetail=Design::find(decrypt($id));
        $employee = User::where('role_id',3)->get();
        return view('Projects.Design.edit',compact('designDetail','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedesignRequest  $request
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $identity = decrypt(session()->get('roleIdentity'));
            $design = Design::find($id);
            $design->designer_id=$request->desiname;
            if($request->hasFile('document')){
                $imageName = rand(111,999).time().'.'.$request->document->extension();  
                $request->document->move(public_path('uploads/design'), $imageName);
                $design->document = $imageName;
            }
            $design->building_squire_feet=$request->bsfeet;
            $design->total_floor_number=$request->tfnumber;
            $design->design_details=$request->designdetails;
            
            $design->status = 1;
            if($design->save()){
                return redirect($identity.'/design')->with('success','Data saved');
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
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(design $design)
    {
        $design->delete();
        return redirect()->route('design.index');

    }
}