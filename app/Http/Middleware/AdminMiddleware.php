<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\UserTraits;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Closure;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     use UserTraits;
    public function handle(Request $request, Closure $next)
    {
        
        if(!$request->session()->has('userId') || $request->session()->has('userId') === null || !$request->session()->has('roleIdentity')){
            return redirect()->route('logout');

        }else{
            
            $user=User::findOrFail(decrypt(session()->get('userId')));
            app()->setLocale($user->language); // language
            if(!$user){
                return redirect()->route('logout');
            }else if(decrypt(session()->get('roleIdentity')) != 'admin'){
                return redirect()->back()->with($this->resMessageHtml(false,'error','Access Denied'));
            }else{
                return $next($request);
            }
        }
        return redirect()->route('logout');
    }
}
