<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface UserServiceInterface
{
    /**
     * To create new user
     * @param Request $request request inputs
     * @return Object $user
     */
    public function register(Request $request);

    /**
     * To login user
     * @param Request $request request inputs
     * @return true or false whether login success or not
     */
    public function login(Request $request);

     /**
     * To logout user
     * @param
     * @return
     */
    public function logout();

    /**
     * To send reset url via mail
     * @param Request $request request inputs
     * @return
     */
    public function sendMail(Request $request);

    /**
     * To reset password
     * @param Request $request inputs request
     * @return success or not message
     */
    public function resetPassword(Request $request);
}

