<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Models\Builder\Budget;
use App\Models\Builder\BudgetDetails;
use App\Models\Builder\FloorDetails;
use App\Models\Builder\Foundation;
use App\Models\Projects\Project;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    use ResponseTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budget::paginate(10);
        return view('budget.index',compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectname = Project::all();
        $floorno = FloorDetails::all();
        $foundation = Foundation::all();
        return view('budget.create',compact('projectname','floorno','foundation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  	project_id  floor_id  foundation_id 	total_working_day 	total_worker 	issus_date
     */
    public function store(Request $request)
    {
        //  	id 	created_at 	updated_at 	project_id name 	floor_id floor no 	foundation_id 	total_working_day 	total_worker 	issus_date 	status 	created_by 	updated_by 	deleted_at 	       
        try {
            DB::beginTransaction();
            $budget = new Budget();
            $budget->project_id = $request->project || 1;
            if($request->foundation_id){
                $budget->foundation_id = $request->foundation;
            }else if($request->floorno){
                $budget->floor_id = $request->floorno;
            }
            
            $budget->total_working_day = $request->working_day;
            $budget->total_worker = $request->worker;
            $budget->issus_date = $request->issus_date;
            $budget->status = 1;
            $budget->created_by =  Crypt::decrypt(session()->get('userId'));

            if($budget->save()){
                $total = null;
                $work = false;
                foreach($request->outer_list as $material){                   
                    $budgetDetails = new BudgetDetails();
                    $budgetDetails->created_by =  Crypt::decrypt(session()->get('userId'));
                    $budgetDetails->budget_id = $budget->id;
                    $budgetDetails->units_id = $material['unit_id'];
                    $budgetDetails->market_price = floatval($material['price']);
                    $budgetDetails->budget_quantity = floatval($material['quantity']);             
                    $budgetDetails->total_budget = $budgetDetails->market_price * $budgetDetails->budget_quantity;
                    $total.=$budgetDetails->total_budget;
                    if($budgetDetails->save()){
                        $work = true;                  
                    }
                }

                if($work){
                    DB::commit();
                    return redirect()->back()->with($this->resMessageHtml(true, false, 'Project created successfully'));
                }
            }       

        } catch (Exception $err) {
            dd($err);
            DB::rollBack();
            return redirect()->back()->with($this->resMessageHtml(false, 'error', 'Cannot create Project, Please try again'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        $projectname = Project::all();
        $floorno = FloorDetails::all();
        $foundation = Foundation::all();
        return view('budget.edit',compact('budget','projectname','floorno','foundation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        try{
            $material = $budget;
            $material->project_id = $request->projectName;
            $material->floor_id = $request->floorno;
            $material->foundation_id = $request->pilesheight;
            $material->total_working_day = $request->totalday;
            $material->total_worker = $request->tworker;
            $material->issus_date = $request->issuedate;

            $material->status = 1;
            $material->created_by = Crypt::decrypt(session()->get('userId'));
            $identity = decrypt(session()->get('roleIdentity'));

            if($material->save()){
                return redirect($identity.'/budget')->with('success','Data saved');
            }
        }catch(Exception $err){
            dd($err);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->back();
    }
}
