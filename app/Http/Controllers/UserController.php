<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Http\Requests\SignInRequest;
use App\User;

class UserController extends Controller
{
    public function index() {
        return User::all();
    }

    public function signUp(SignUpRequest $request) {
        if(User::checkEmail($request->email)) {
            return response('email exists', 200);
        } else {
            $user = new User();
            $user->create($request);
            return response('ok', 200);
        }
    }

    public function signIn(SignInRequest $request) {
        if(!($user = User::checkEmail($request->email))) {
            return response('user not exists', 200);
        } else {
            
            if(!$user->checkPassword($request->password)) {
                return response('wrong password', 200);
            } else {
                \Session::put('user', $user->id);

                return response('ok', 200);
            }

        }
    }

    public function login() {
        $id = \Session::get('user');
        
        if($id) {
            $user = User::find($id);
            return response('login', 200)->header('user-full-name', json_encode($user->getFullName()));
        } else {
            return response('logoff', 200);
        }
    }
}
