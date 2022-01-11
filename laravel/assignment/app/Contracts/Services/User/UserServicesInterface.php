<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

interface UserServicesInterface
{
    /**
     * To register user
     * @param Request $request
     * @return message success or not
     */
    public function register(Request $request);

    /**
     * To login user
     * @param Request $request
     * @return message success or not
     */
    public function login(Request $request);

    /**
     * To send reset password link via mail
     * @param Request $request
     * @return message success or not
     */
    public function sendResetPasswordMail(Request $request);

    /**
     * To reset password
     * @param Request $request, $token
     * @return true
     */
    public function resetPassword(Request $request);
}
