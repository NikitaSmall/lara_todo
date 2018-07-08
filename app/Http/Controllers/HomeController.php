<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('home', ['todos' => $todos]);
    }
}
