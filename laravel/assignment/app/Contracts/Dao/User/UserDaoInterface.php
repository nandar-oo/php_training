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
}
