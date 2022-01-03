<?php

namespace App\Contracts\Dao\User;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface UserDaoInterface
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
     * @return true or false
     */
    public function login(Request $request);

     /**
     * To logout user
     * @param
     * @return
     */
    public function logout();

    /**
     *To reset user password
     * @param Request $request
     * @return message success or not
     */
    public function updatePassword($request);

    /**
     *To create new record in password_resets table
     * @param $token, $email
     * @return
     */
    public function insertToken($token,$email);

     /**
     *To get token
     * @param  $email
     * @return Object password_resets
     */
    public function getToken($email);
}
