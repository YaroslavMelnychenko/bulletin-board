<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignUpRequest;

class User extends Model
{
    public static function checkEmail($email) {        
        $instance = self::where('email', $email)->first();

        if($instance !== null) return $instance;
        else return false;
    }
    
    public function ads() {
        return $this->hasMany('App\Ad');
    }

    public function getFullName() {
        return $this->first_name." ".$this->last_name;
    }

    public function create(SignUpRequest $request) {
        $this->first_name = $request->firstName;
        $this->last_name = $request->lastName;
        $this->email = $request->email;
        $this->password = Hash::make($request->password);
        $this->save();
    }

    public function checkPassword($password) {
        return Hash::check($password, $this->password);
    }
}
