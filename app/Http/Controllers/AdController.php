<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{
    public function index() {
        return Ad::orderBy('id', 'desc')->get();
    }

    public function paginate($take) {
        return Ad::orderBy('created_at', 'desc')->paginate($take);
    }
}
