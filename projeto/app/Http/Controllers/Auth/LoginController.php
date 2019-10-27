<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/requerimento';

    protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest:funcionario')->except('logout');
    }

    public function logout(){

        $user = Auth::user();
        Log::info('Usuario Saiu. ', [$user]);
        Auth::logout();
        Session::flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout: '/');

    }

    public function loginFunc($request) {

    }

    public function adminLogin(Request $request){

        //$this->validateLogin($request);

        if(auth()->guard('funcionario')->attempt($this->credentials($request), $request->filled('remember'))){
            //return sendLoginResponseFunc($request);
            dd(auth()->guard('funcionario')->user());
            //return view();
        }

        return back()->withErrors(['email' => 'Email ou senhas estão errados']);
    }

    public function attemptLoginFunc(Request $request) {
        return $this->guard('funcionario')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function sendLoginResponseFunc(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard('funcionario')->user())
                ?: redirect()->intended($this->redirectPath());
    }

}
