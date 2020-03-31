<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AdCreateRequest;

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

    public function create(AdCreateRequest $request, $userId) {
        $this->header = $request->title;
        $this->text = $request->text;
        
        if($request->image) {
            $this->image = 'storage/'.\Storage::disk('public')->put('images', $request->image, 'public');
        }

        $this->user_id = $userId;
        $this->save();
    }
}
