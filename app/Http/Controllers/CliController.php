<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CliController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('client.cli');
    }
    public function cli_new()
    {
        return view('client.cli_new');
    }
}
