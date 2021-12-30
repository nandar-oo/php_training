<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\UserServiceInterface;

class AuthController extends Controller
{

    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;
    }

    /**
     *
     * @return registeration view
     */
    public function registerationForm(){
        return view('auth.registration');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $message=$this->userInterface->register($request);
        return redirect()->route('login');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $status=$this->userInterface->login($request);

        if ($status) {
            return redirect()->route('taskList');
        }
        return redirect('/')->with(['errorMessage' => 'Oppes! You have entered invalid credentials']);
    }

    public function logout(){
        $this->userInterface->logout();
        return redirect()->route('login');
    }
}
