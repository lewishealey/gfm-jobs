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

        var_dump($application);

        $response = new Response;
        $response->description = $request->description;
        $response->post_id = $application->post->id;
        $response->application_id = $application->id;

        $application->email_sent = 1;
        $application->save();

        if($response->save()) {
            Mail::to($application->email)->send(new PostResponse($response));
            $request->session()->flash('alert-success', $application->first_name . ' application letter has been sent');

            return redirect()->route('applications.post',['id' => $application->post->id]);
        }

        
    }
}
