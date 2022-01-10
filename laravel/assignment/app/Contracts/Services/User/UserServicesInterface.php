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
}
