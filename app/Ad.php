<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Ad extends Model
{
    protected $appends = [
        'author'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getAuthorAttribute() {
        return $this->attributes['author'] = User::find($this->user_id)->getFullName();
    }
}
