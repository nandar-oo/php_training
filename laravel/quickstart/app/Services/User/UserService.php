<?php

namespace App\Services\User;

use Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

/**
 * Service class for task.
 */
class UserService implements UserServiceInterface
{
    /**
     * task dao
     */
    private $userDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To create new user
     * @param Request $request request inputs
     * @return Object $user
     */
    public function register(Request $request)
    {
        $user = $this->userDao->register($request);
        return $user;
    }

    /**
     * To login user
     * @param Request $request request inputs
     * @return true or false whether login success or not
     */
    public function login(Request $request)
    {
        return $this->userDao->login($request);
    }

    /**
     * To logout user
     * @param
     * @return
     */
    public function logout()
    {
        return $this->userDao->logout();
    }

    /**
     * To send reset url via mail
     * @param Request $request request inputs
     * @return
     */
    public function sendMail(Request $request)
    {
        $token = Str::random(64);
        $this->userDao->insertToken($token, $request->email);

        Mail::send('auth.resetMail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email, 'Dear Customer')->subject('Reset Password');
        });
    }

    /**
     * To reset password
     * @param Request $request inputs request
     * @return success or not message
     */
    public function resetPassword(Request $request)
    {
        $record = $this->userDao->getToken($request->email);
        $token = $record->token;

        if ($token == $request->token) {
            $this->userDao->updatePassword($request);
            return true;
        } else {
            return false;
        }
    }
}
