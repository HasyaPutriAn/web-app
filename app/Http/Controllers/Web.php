<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Web extends Controller {
    public function home() {
        return "<h1>Ini adalah Controllers Web</h1>";
    }
}
//import Controller
use App\Http\Controllers\Web;

//route ke controller Web ke fungsi home
Route::get('/web',[Web::class, 'home']);