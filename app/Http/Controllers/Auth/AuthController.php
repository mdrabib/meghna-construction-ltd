<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Auth\User;
use Exception;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{

    use UserTraits;

    public function userLoginForm()
    {
        if (session()->get('userId') && session()->get('userId') !== null) {
            return redirect()->route(Crypt::decrypt(session()->get('roleIdentity')) . '.dashboard');
        }
        return view('auth.login');
    }

    public function userLoginCheck(LoginRequest $request)
    {


        try {
            $user = User::where('email', $request->userEmailAddress)->first();
            if ($user) {
                if ($request->userPassword === Crypt::decryptString($user->password)) {
                    $this->userSessionData($user);
                    return redirect()->route($user->role->identify . '.dashboard')->with($this->resMessageHtml(true, null, 'Successfully login'));
                } else
                    return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential! Please try Again'));
            } else {
                return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential!. Or no user found!'));
            }
        } catch (Exception $error) {
            dd($error);
            return redirect()->route('userlogin')->with($this->resMessageHtml(false, 'error', 'wrong cradential!'));
        }
    }


    public function userSessionData($user)
    {
        // get secret text from env. 2nd value is the default value
        $secret = env('APP_SECRET', 'rabibashabjahidconstractionltd');

        return request()->session()->put(
            [
                'userId' => encrypt($user->id),
                'userName' => encrypt($user->name),
                'roleID' => encrypt($user->role->id),
                'role' => encrypt($user->role->role),
                'roleIdentity' => encrypt($user->role->identify),
                'language' => encrypt($user->language),
                'companyId' => encrypt($user->company_id),
                'avatar' => $user->avatar ? $user->avatar : 'avatar.png'
            ]
        );
    }


    public function logOut()
    {
        // $userId = Crypt::decrypt(session()->get('userId'));
        request()->session()->flush();
        return redirect('/')->with($this->resMessageHtml(false, false, 'Please Login to get access'));
    }
}
