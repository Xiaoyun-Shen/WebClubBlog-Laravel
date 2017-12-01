<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Model\Admin\Admin;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating user for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $admin=Admin::where('email',$request->email)->first();
        if(count($admin)){
            if($admin->status==0){
                return ['email'=>'inactive','password'=>'You are not an active person,please contact Admin'];
            }else{
                return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
            }
        }else{
            return $request->only($this->username(), 'password');
        }




    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        //throw ValidationException::withMessages([
         //    $this->username() => [trans('auth.failed')],
       // ]);
         $fields=$this->credentials($request);
         if($fields['email']=='inactive'){
             throw ValidationException::withMessages([
                 $this->username() => $fields['password'],
             ]);
         }else{
             throw ValidationException::withMessages([
                 $this->username() => [trans('auth.failed')],
             ]);
         }


    }


    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    /**
     * Where to redirect user after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    protected function guard()
    {
        return Auth::guard('admin');
    }
}
