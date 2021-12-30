<?php

namespace App\Services\User;

use Illuminate\Http\Request;
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
    public function register(Request $request){
        $user=$this->userDao->register($request);
        return $user;
    }

    /**
     * To login user
     * @param Request $request request inputs
     * @return true or false whether login success or not
     */
    public function login(Request $request){
        return $this->userDao->login($request);
    }

    /**
     * To logout user
     * @param
     * @return
     */
    public function logout(){
        return $this->userDao->logout();
    }

}
