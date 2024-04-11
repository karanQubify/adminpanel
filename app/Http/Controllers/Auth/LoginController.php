<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Middleware\{isUserMiddleware,isAdminMiddleware,isOperatorMiddleware};

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([ 'guest' ])->except('logout');
    }

    // public function sendLoginResponse(Request $request)
    // {
    //     $user = Auth::user();

    //     if ($user->hasRole('admin')) {
    //         $this->middleware('isAdminMiddleware');
    //     } elseif ($user->hasRole('operator')) {
    //         $this->middleware('isOperatorMiddleware');
    //     } else {
    //         $this->middleware('isUserMiddleware');
    //     }

    //     if ($request->hasSession()) {
    //         $request->session()->put('auth.password_confirmed_at', time());
    //     }

    //     return redirect()->intended($this->redirectPath());
    // }

    protected function authenticated(Request $request, $user)
    {   
        
            
        if ($user->hasRole('admin')) {
            $this->redirectTo = route('admin.dashboard'); 
        } elseif ($user->hasRole('developer')) {
            $this->redirectTo = route('developer.dashboard'); 

        } else {
            $this->redirectTo = route('client.dashboard'); 
        }
    }
}
