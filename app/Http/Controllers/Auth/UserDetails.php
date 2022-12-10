<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Models\Auth\UserDetails as AuthUserDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\DB;

class UserDetails extends RoutingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(User $request, $id)
    {
        // dd($request);
        DB::beginTransaction();
        try{
            //  name 	email 	phone
            User::where($request->user_id)->update([
                'name'=>$request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            // $userdetails = DB::table('úser_details');
            // $userdetails->father_name = 'ka';
            // $user = $request;
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->phone = $request->phone;

            // user_id 	designation_id 	father_name 	mother_name 	bio 	gender 	resume 	present_address 	present_country_id 	present_division_id 	present_district_id 	permanent_address 	permanent_country_id 	permanent_division_id 	permanent_district_id 	status

            AuthUserDetails::where($request->user_id)->update([
                'bio'=>$request->name,
                'father_name' => $request->email,
                'mother_name' => $request->phone,
                'gender' => $request->phone,
                'designation_id' => $request->phone,

                'present_address' => $request->phone,
                'present_country_id' => $request->phone,
                'present_division_id' => $request->phone,
                'present_district_id' => $request->phone,

                'permanent_address' => $request->phone,
                'permanent_country_id' => $request->phone,
                'permanent_division_id' => $request->phone,
                'permanent_district_id' => $request->phone,

                'status' => 1,
    
            ]);
            // $userdetails = $request;
            // $userdetails->bio = $request->userBio;
            // $userdetails->father_name = $request->fathername;
            // $userdetails->mother_name = $request->mothername;
            // $userdetails->gender = $request->usergender;
            // $userdetails->designation_id = $request->designation;
            
            // if($request->resume){
            //     $userdetails->resume = $request->resume;
            // }

            // $userdetails->present_address = $request->preaddress;
            // $userdetails->present_country_id = $request->country;
            // $userdetails->present_division_id = $request->division;
            // $userdetails->present_district_id = $request->district;
            // $userdetails->permanent_address = $request->peraddress;
            // $userdetails->permanent_country_id = $request->slectcountry;
            // $userdetails->permanent_division_id = $request->slectdivision;
            // $userdetails->permanent_district_id = $request->slectdistrict;
            // $userdetails->status = 1;

            // if($user->save()){
            //     $userdetails->project_id =  $user->id;
            //     if($userdetails->save()){

                
            //     DB::commit();
            //     return redirect(route('project.index'))->with($this->resMessageHtml(true, false, 'Profile updated successfully'));
            //     }
            // }
            
            //});
            return redirect(route('project.index'))->with($this->resMessageHtml(true, false, 'Profile updated successfully'));
        } catch (Exception $err) {
            dd($err);
            DB::rollBack();
            return redirect()->back()->with($this->resMessageHtml(false, 'error', 'Cannot update profile, Please try again'));
        }
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
