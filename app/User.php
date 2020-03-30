<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
