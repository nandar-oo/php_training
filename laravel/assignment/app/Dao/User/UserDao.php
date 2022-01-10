<?php

namespace App\Dao\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\User\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * To create user
     * @param Request $request
     * @return
     */
    public function createUser(Request $request)
    {
        $user = new User;
        DB::transaction(function () use ($user, $request) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        });
        return $user;
    }
}
