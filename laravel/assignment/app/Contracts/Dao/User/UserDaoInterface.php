<?php

namespace App\Contracts\Dao\User;

use Illuminate\Http\Request;


/**
 * Interface for Data Accessing Object of Post
 */
interface UserDaoInterface
{
    /**
     * To create user
     * @param Request $request
     * @return
     */
    public function createUser(Request $request);

    /**
     * To save password reset email and token
     * @param $email, $token
     * @return true
     */
    public function saveResetToken($email, $token);

    /**
     * To get password reset email and token
     * @param $email, $token
     * @return object
     */
    public function getToken($email, $token);

    /**
     * To update user password
     * @param Request $request
     * @return true
     */
    public function resetPassword(Request $request);
}
