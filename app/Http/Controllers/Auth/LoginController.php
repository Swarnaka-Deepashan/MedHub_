<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/upload-prescription';

    public function redirectTo()
    {
        // Check if the authenticated user is an admin
        if (auth()->user()->user_type === 'admin') {
            // Redirect to the route for admin
            //return route('quotations.create', ['prescription' => 1]); // Adjust according to your needs
            return route('prescriptionsIndex');

        }

        // Default redirect for guests
        return route('prescriptions');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
