<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Util\Json;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Json::encode(auth()->user());

        return view('home', compact('user'));
    }

    public function welcome(){
        return view('welcome');
    }
}
