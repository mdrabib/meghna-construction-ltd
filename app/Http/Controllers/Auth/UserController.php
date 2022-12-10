<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use  App\Http\Requests\Auth\RegisterRequest;
use Exception;
// use App\Traits\ResponseTrait;
use App\Http\Controllers\Auth\UserTraits;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auth\Role;
use App\Models\Auth\UserDetails;
use App\Models\Builder\Designation;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    use UserTraits;

    // ? GET all members
    public function index()
    {
        $members = User::all();
        return view('Users.members',compact('members'));
    }
    // ? GET all members
    // public function admins()
    // {
    //     $admins = User::findOrFail('role_id',1);
    //     return view('Users.admins',compact('admins'));
    // }

    public function create()
    {
        //
        $roles = Role::all();
        $designation = Designation::all();
        return view('Users.create', compact(['roles', 'designation']));
    }

    // 

    // *** Registration Form ***

    public function userRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    // *** Registration Store ***

    public function userRegistrationStore(RegisterRequest $request)
    {
        if(session()->get('userId') && session()->get('userId') !== null ){
            return redirect()->route(Crypt::decrypt(session()->get('roleIdentity')).'.dashboard');
        }
        try {
            $store = new User();

            // $store->name = $request->input('userFullName');
            $store->name = $request->userFullName;
            $store->email = $request->userEmailAddress;
            $store->password =  Crypt::encryptString($request->userPassword);
            $store->role_id = $request->userRoles;
            $store->phone = $request->userPhoneNumber;
            

            if ($store->save()) {
                return redirect('/')->with($this->resMessageHtml(true, false, 'User created successfully'));
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with($this->responseMsg(false, 'error', 'Server error'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        try {
            $store = new User();

            // $store->name = $request->input('userFullName');
            $store->name = $request->userFullName;
            $store->email = $request->userEmailAddress;
            $store->password =  Crypt::encryptString($request->userPassword);
            $store->role_id = $request->userRoles;
            $store->phone = $request->userPhoneNumber;
            // $store->avatar = $request->userAvatar;

            if($request->hasFile('userAvatar')){
                $imageName = rand(111,999).time().'.'.$request->userAvatar->extension();  
                $request->userAvatar->move(public_path('uploads/document'), $imageName);
                $store->avatar=$imageName;
            }else{
                $store->avatar='avatar.png';
                
            }

            if ($store->save()) {
                $UserDetails = New UserDetails();
                if($request->designation){
                    $UserDetails->designation_id = $request->designation;
                    $UserDetails->created_by = Crypt::decrypt(session()->get('userId'));
                }else{
                    $UserDetails->created_by = $store->id;
                    
                }
                
                $UserDetails->status = 1;  
                $UserDetails->user_id = $store->id;
                $UserDetails->save();  
                return redirect(route('member.index'))->with($this->resMessageHtml(true, false, 'User created successfully'));
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with($this->resMessage(false, 'error', 'Server error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        return view('profile.account',compact('member'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $member)
    {
        // dd($members);
        // Crypt::decrypt()
        $roles = Role::all();
        $designation = Designation::all();
        return view('Users.edit',compact(['member','roles','designation']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $member)
    {
        
        try {
            $store = $member;
            $store->name = $request->userFullName;
            $store->email = $request->userEmailAddress;
            $store->role_id = $request->userRoles;
            $store->phone = $request->userPhoneNumber;
            // $store->avatar = $request->userAvatar;
            
            if($request->userPassword !== "")              
                $store->password =  Crypt::encryptString($request->userPassword);
            
            if($request->hasFile('userAvatar')){
                $imageName = rand(111,999).time().'.'.$request->userAvatar->extension();  
                $request->userAvatar->move(public_path('uploads/profile'), $imageName);
                $store->avatar=$imageName;
            }

            if ($store->save()) {
                return redirect(route('member.index'))->with($this->resMessageHtml(true, false, 'member has been updated'));
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with($this->resMessage(false, 'error', 'Server error'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $member)
    {
        //
        $member->delete();
        return redirect()->back();
    }
}
