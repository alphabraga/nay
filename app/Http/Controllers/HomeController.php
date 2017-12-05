<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\FrontController;

class HomeController extends FrontController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       parent::__construct();
    }

    public function index()
    {
        return view('home');
    }
}
