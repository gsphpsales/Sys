<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prod.prod');
    }
    public function cat_new()
    {
        return view('prod.prod_new');
    }
}
