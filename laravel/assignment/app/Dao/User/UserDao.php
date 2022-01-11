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

    /**
     * To save password reset email and token
     * @param $email, $token
     * @return true
     */
    public function saveResetToken($email, $token)
    {
        DB::table('password_resets')
            ->insert([
                'email' => $email,
                'token' => $token
            ]);
        return true;
    }

    /**
     * To get password reset email and token
     * @param $email, $token
     * @return object
     */
    public function getToken($email, $token)
    {
        $record = DB::table('password_resets')
            ->where('email', $email)
            ->where('token', $token)
            ->get();
        return $record;
    }

    /**
     * To update user password
     * @param Request $request
     * @return true
     */
    public function resetPassword(Request $request)
    {
        $user=User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);
        DB::table('password_resets')
                ->where('email',$request->email)
                ->delete();
        return $user;
    }
}
