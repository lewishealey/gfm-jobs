<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Response;
use App\Application;

use App\Mail\PostResponse;

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
    public function store(Request $request)
    {   
        $this->validate($request, [
            'description' => 'required'
        ]);

        $application = Application::find($request->id);

        $response = new Response;
        $response->description = $request->description;
        $response->post_id = $application->post->id;
        $response->application_id = $application->id;

        if($response->save()) {
            Mail::to($request->email)->send(new PostResponse($response));
            return redirect()->route('home');
        }

        
    }
}
