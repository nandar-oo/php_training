<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->userDao=$userDaoInterface;
    }

    /**
     * To register user
     * @param Request $request
     * @return message success or not
     */
    public function register(Request $request)
    {
        $user=$this->userDao->createUser($request);
        return $user;
    }

    /**
     * To login user
     * @param Request $request
     * @return message success or not
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
}
