<?php

namespace App\Dao\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Contracts\Dao\User\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * To create new user
     * @param Request $request request inputs
     * @return Object $user
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return $user;
    }

    /**
     * To login user
     * @param Request $request request inputs
     * @return true or false whether login success or not
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials);
    }

    /**
     * To logout user
     * @param
     * @return
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
    }

    /**
     *To reset user password
     * @param Request $request
     * @return message success or not
     */
    public function updatePassword($request)
    {
        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        return "update success";
    }

    /**
     *To create new record in password_resets table
     * @param $token, $email
     * @return
     */
    public function insertToken($token, $email)
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     *To get token
     * @param  $email
     * @return Object password_resets
     */
    public function getToken($email)
    {
        $token=DB::table('password_resets')
                ->where('email',$email)->first();
        DB::table('password_resets')
        ->where('email',$email)->delete();
        return $token;
    }
}
