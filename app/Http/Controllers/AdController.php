<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdCreateRequest;
use App\Ad;

class AdController extends Controller
{
    public function index() {
        return Ad::orderBy('id', 'desc')->get();
    }

    public function paginate($take) {
        return Ad::orderBy('created_at', 'desc')->paginate($take);
    }

    public function create(AdCreateRequest $request) {
        $id = \Session::get('user');

        if(!$id) {
            return response('not authorized', 401);
        } else {
            $ad = new Ad();
            $ad->create($request, $id);
            
            return response('ok', 200);
        }
    }
}
