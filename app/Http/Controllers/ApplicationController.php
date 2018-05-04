<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\Application;
use Carbon\Carbon;

use App\Mail\NewApplication;
use App\Mail\ApplicationConfirmation;

class ApplicationController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'hear' => 'required',
            'cv' => 'required|max:2048|mimes:pdf,doc,docx'
        ]);

        $application = new Application;
        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->email = $request->email;
        $application->hear = $request->hear;
        $application->post_id = $request->post_id;

		
		if (request()->hasFile('cv')) {
          $filename = $request->file('cv')->getClientOriginalName();
          Storage::put($filename, $request->file('cv'));
          $application->cv = $filename;
        }

        if($application->save()) {
          Mail::to("liam.barrett@gfm.co.uk")->send(new NewApplication($application));
          Mail::to($application->email)->send(new ApplicationConfirmation($application));
          return redirect()->route('successful.application', ['id' => $application->id]);
        }   

    }

    /**
     * Sucessful application
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request, $id)
    {   
        $application = Application::find($id);
        return view('user.success', ['application' => $application]);
    }

    /**
     * Accept application
     *
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request, $id)
    {   
        $application = Application::find($id);

        if($application->rejected = 1) {
          $application->rejected = NULL;
        }

        $application->accepted = 1;
        $application->save();

        // Get correct response - accept response that matches category
        $response = DB::table('template')->where('category', $application->post->category)->where('type', 'accept')->first();
        $date = Carbon::now()->format('l jS \\of F');

        if($response) {
            $response->contents = str_replace('*|NAME|*', $application->first_name . " " . $application->last_name, $response->contents); 
            $response->contents = str_replace('*|JOB|*', $application->post->title, $response->contents);
            $response->contents = str_replace('*|DATE|*', $date, $response->contents);
        }

        $request->session()->flash('alert-success', $application->first_name . ' has been accepted');

        return view('admin.accept', ['application' => $application, 'response' => $response]);
    }

     /**
     * Reject application
     *
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, $id)
    {   
        $application = Application::find($id);

        if($application->accepted = 1) {
          $application->accepted = NULL;
        }
        
        $application->rejected = 1;
        $application->save();

        // Get correct response - reject response that matches category
        $response = DB::table('template')->where('category', $application->post->category)->where('type', 'reject')->first();
        $date = Carbon::now()->format('l jS \\of F');

        if($response) {
            $response->contents = str_replace('*|NAME|*', $application->first_name . " " . $application->last_name, $response->contents); 
            $response->contents = str_replace('*|JOB|*', $application->post->title, $response->contents);
            $response->contents = str_replace('*|DATE|*', $date, $response->contents);
        }

        $request->session()->flash('alert-danger', $application->first_name . ' has been rejected');

        return view('admin.reject', ['application' => $application, 'response' => $response]);

        // $response = DB::table('template')->where('category', $application->post->category)->where('type', 'reject')->first();

        // return view('admin.reject', ['application' => $application, 'response' => $response]);
    }




}
