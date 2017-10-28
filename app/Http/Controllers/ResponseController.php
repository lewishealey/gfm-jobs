<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
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
     * Store and send the response
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        

        
    }
}
