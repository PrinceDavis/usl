<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckUsersRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function postCheckuser(CheckUsersRequest $request)
    {
       $requests = $request->all();
        $user = User::where('fullname', '=', $requests['fullname'])
                      ->where('phone', '=', $requests['phone'])
                      ->first();
        if(!$user)
        {            
            flash("We couldn't find a Shareholder with the information you provided. Try again");
            return redirect('/');
        }
        return view('welcome', compact('user'));
    }

    public function postConfirmuser(Request $request)
    {   $requests = $request->all();
        $user = User::find($request['id']);
        $user->unique_id = uniqid();
        $user->update();
        flash("We have sent you a message with your unique Id it is: ".$user->unique_id);
        return redirect('/');
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array   $parameters
     * @return redirect
     */
    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
