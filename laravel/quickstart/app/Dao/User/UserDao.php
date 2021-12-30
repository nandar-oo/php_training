<?php
namespace App\Dao\User;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function register(Request $request){
        $user=User::create([
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
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials);
    }

    /**
     * To logout user
     * @param
     * @return
     */
    public function logout(){
        Session::flush();
        Auth::logout();
    }
}
