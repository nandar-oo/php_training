<?php

namespace App\Services\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServicesInterface;

class UserService implements UserServicesInterface
{
    private $userDao;
    /**
     * Contruct Class
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDaoInterface)
    {
        $this->userDao = $userDaoInterface;
    }

    /**
     * To register user
     * @param Request $request
     * @return message success or not
     */
    public function register(Request $request)
    {
        $user = $this->userDao->createUser($request);
        return $user;
    }

    /**
     * To login user
     * @param Request $request
     * @return message success or not
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * To send reset password link via mail
     * @param Request $request
     * @return message success or not
     */
    public function sendResetPasswordMail(Request $request)
    {
        $token = Str::random(64);
        $this->userDao->saveResetToken($request->email, $token);
        Mail::send('Auth.passwordMail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email, 'Receiver')->subject('Reset Password');
        });
        return true;
    }

    /**
     * To reset password
     * @param Request $request, $token
     * @return true
     */
    public function resetPassword(Request $request)
    {
        $record = $this->userDao->getToken($request->email, $request->token);
        if (!$record) {
            return back()->with(['errorMessage' => '!Invalid emaill and token!']);
        }

        $this->userDao->resetPassword($request);
        return redirect()->route('login');
    }
}
