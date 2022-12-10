<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Models\Auth\User;
use App\Models\Lands\Land;
use App\Models\Projects\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    use ResponseTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::paginate(10);
        return view('Projects.list',compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $landOwner = User::where('role_id', 4)->get();
        return view('Projects.create', compact('landOwner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // project_name 	project_overview 	start_date 	end_date 	budget 	user_id 	status
        // dd($request->projectImage);

        DB::beginTransaction();
        try {

            //DB::transaction(function () use ($request) {

                $project = new Project();
                $project->project_name = $request->projectNameInputField;
                // $project->project_name = $request->landownerdata;
                $project->project_overview = $request->projectOverview;
                $project->ownerShip = $request->projectOwnerShip / 100;

                $project->start_date = $request->parojectStarDate;
                $project->end_date = $request->parojectEndDate;
                $project->budget = $request->totalBudget;
                $project->user_id = $request->landownerdata;
                $project->stage_id = 1;
                $project->status = 1;
                $project->created_by = Crypt::decrypt(session()->get('userId'));
                if ($request->hasFile('projectImage')) {
                    // dd($request->projectImage);
                    $imageName = rand(111, 999) . time() . '.' . $request->projectImage->extension();
                    $request->projectImage->move(public_path('uploads/projects'), $imageName);
                    $project->project_image = $imageName;
                }
                // lands table
                // user_id 	squire_feet 	house_no 	block 	road_no 	address 	document_id 	design_id 	total_budget 	total_cost 	status

                $land = new Land();
                $land->land_area = $request->plotArea;
                $land->plot_area_counter = $request->plotAreaCounter;
                $land->building_area = $request->BuildingArea;
                $land->Building_area_counter = $request->BuildingAreaCounter;
                $land->building_height = $request->BuildingHeight;
                $land->Building_height_counter = $request->BuildingHeightCounter;
                $land->house_no = $request->houseNo;
                $land->block = $request->block;
                $land->road_no = $request->roadNo;
                // $land->total_budget = $request->squireFeet;
                $land->created_by = Crypt::decrypt(session()->get('userId'));
                $land->country_id = $request->country;
                $land->division_id = $request->division;
                $land->district_id = $request->district;             

                if($project->save()){
                    $land->project_id =  $project->id;
                    if($land->save()){

                    
                    DB::commit();
                   // return redirect(route('project.index'))->refresh()->with($this->resMessageHtml(true, false, 'Project created successfully'));
                    return redirect(route('project.index'))->with($this->resMessageHtml(true, false, 'Project created successfully'));
                    }
                }
                
            //});
        } catch (Exception $err) {
            dd($err);
            DB::rollBack();
            return redirect()->back()->with($this->resMessageHtml(false, 'error', 'Cannot create Project, Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // $project = Crypt::decrpt($project);
        
        return view('Projects.details',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
