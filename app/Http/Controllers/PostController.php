<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;

class PostController extends Controller
{

    /**
     * Show the Job post.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'salary' => 'required',
            'attachment' => 'max:2048|mimes:pdf,doc,docx'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title, "-");
        $post->salary = $request->salary;
        $post->hours = $request->hours;
        $post->extra = $request->extra;
        $post->category = $request->category;
        $post->brand = $request->brand;
        $post->location = $request->location;
        $post->description = $request->description;
        
        if (request()->hasFile('attachment')) {
          $filename = $request->file('attachment')->getClientOriginalName();
          Storage::put($filename, $request->file('attachment'));
          $post->attachment = $filename;
        }

        if($post->save()) {
            return redirect()->route('home');
        }

    }


    /**
     * Update the Job post.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {      
        $this->validate($request, [
            'title' => 'required',
            'salary' => 'required',
            'attachment' => 'max:2048|mimes:pdf,doc,docx'
        ]);

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title, "-");
        $post->salary = $request->salary;
        $post->hours = $request->hours;
        $post->extra = $request->extra;
        $post->category = $request->category;
        $post->brand = $request->brand;
        $post->location = $request->location;
        $post->description = $request->description;
        
        if (request()->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $path = $request->file('attachment')->store('files');
            $post->attachment = $path;
        }

        if($post->save()) {
            return redirect()->route('home');
        }

    }

    /**
     * Show single post
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {   
        $post = Post::find($id);
        return view('user.job', ['post' => $post]);
    }

    /**
     * Edit single post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::find($id);
        return view('admin.job', ['post' => $post]);
    }


    /**
     * Show all applications of job
     *
     * @return \Illuminate\Http\Response
     */
    public function applications($id)
    {   
        $post = Post::find($id);
        return view('admin.applications', ['post' => $post]);
    }

    /**
     * Show all jobs
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {   
        $posts = Post::all();
        return view('user.jobs', ['posts' => $posts]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-job');
    }
}
