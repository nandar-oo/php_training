<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Contracts\Services\User\UserServicesInterface;

class AuthController extends Controller
{
    private $userInterface;

    /**
     * Class Constructor
     * @param UserServicesInterface
     * @return
     */
    public function __construct(UserServicesInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;
    }

    /**
     * To redirect login form
     */
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    /**
     * To check user
     * @param Request $request
     * @return view if user is correct, or incorrect message
     */
    public function submitLoginForm(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $status = $this->userInterface->login($request);
        if ($status) {
            return redirect()->route('studentList');
        }

        return back()->with(['error' => 'Oppes! You have entered invalid credentials']);
    }

    /**
     * To redirect registeration form
     * @param
     * @return view
     */
    public function showRegisterationForm()
    {
        return view('Auth.registeration');
    }

    /**
     * To create new user
     * @param Request $request
     * @return view if user is correct, or incorrect message
     */
    public function submitRegisterationForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirmation',
            'confirmation' => 'required'
        ]);
        $this->userInterface->register($request);
        return redirect()->route('studentList');
    }

    /**
     * To logout
     * @param
     * @return
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * To redirect forget-password form
     * @param
     * @return
     */
    public function showForgetPasswordForm()
    {
        return view('Auth.forgetPassword');
    }

    /**
     * To send reset password link to user email
     * @param Request $request
     * @return message
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);
        $this->userInterface->sendResetPasswordMail($request);
        return back()->with(['message' => 'We have e-mailed your password reset link!']);
    }

    /**
     * To redirect reset-password form
     * @param
     * @return
     */
    public function showResetPasswordForm($token)
    {
        return view('Auth.resetPassword')->with(['token' => $token]);
    }

    /**
     * To reset password
     * @param Request $request, $token
     * @return message success or not
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|same:confirmation',
            'confirmation' => 'required'
        ]);
        $this->userInterface->resetPassword($request);
        return redirect()->route('login');
    }
}
