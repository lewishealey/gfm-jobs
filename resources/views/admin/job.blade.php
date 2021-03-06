@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
    	 	@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Edit {{$post->title}}</h2>

            <form action="/post/update" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p><label>Title</label><input type="text" name="title" class="form-control" value="{{$post->title}}" placeholder="Title"/></p>
                <p><label>Salaray</label><input type="text" name="salary" class="form-control" value="{{$post->salary}}" placeholder="Salary"/></p>
                <p>
                    <label>Hours</label>
                    <select name="hours" class="form-control">
                        <option {{ ($post->hours == "Full-time" ? "selected":"") }} value="Full-time">Full-time</option>
                        <option {{ ($post->hours == "Part-time" ? "selected":"") }} value="Part-time">Part-time</option>
                    </select>
                </p>
                <p>
                <label>Extra</label>
                <input type="text" name="extra" class="form-control" value="{{$post->extra}}" placeholder="Any additional info?"/></p>

                <p>
                <label>Category</label>
                <select name="category" class="form-control">
                    <option {{ ($post->category == "Customer Service" ? "selected":"") }} value="Customer Service">Customer service</option>
                    <option {{ ($post->category == "Management" ? "selected":"") }} value="Management">Management</option>
                    <option {{ ($post->category == "Design" ? "selected":"") }} value="Design">Design</option>
                    <option {{ ($post->category == "Web Development" ? "selected":"") }} value="Web Development">Web Development</option>
                    <option {{ ($post->category == "IT" ? "selected":"") }} value="IT">IT</option>
                    <option {{ ($post->category == "Finance" ? "selected":"") }} value="Finance">Finance</option>
                    <option {{ ($post->category == "HR" ? "selected":"") }} value="HR">HR</option>
                    <option {{ ($post->category == "Learning & Development" ? "selected":"") }} value="Learning & Development">Learning & Development</option>
                    <option {{ ($post->category == "Retentions" ? "selected":"") }} value="Retentions">Retentions</option>
                    <option {{ ($post->category == "Reception" ? "selected":"") }} value="Reception">Reception</option>
                    <option {{ ($post->category == "Client Services" ? "selected":"") }} value="Client Services">Client Services</option>
                </select>
                </p>
                <p>
                    <label>Brand</label>
                    <select name="brand" class="form-control">
                        <option {{ ($post->brand == "ClearComms" ? "selected":"") }} value="clear-comms">GFM Clearcomms</option>
                        <option {{ ($post->brand == "GFM" ? "selected":"") }} value="GFM">GFM</option>
                        <option {{ ($post->brand == "Breakfree Holidays" ? "selected":"") }} value="Breakfree Holidays">Breakfree Holidays</option>
                    </select>
                </p>
                 <p>
                 <label>Location</label>
                 <input type="text" name="location" class="form-control" value="{{ $post->location }}" placeholder="Location"/></p>
                <p>
                <label>Attachment</label>
                <input type="file" name="attachment" class="form-control" placeholder="Attachment"/></p>
                @if(isset($post->attachment))
                    <p class="alert alert-default"><a href="{{asset("storage/" . $post->attachment)}}" target="blank">View current file</a></p>
                @endif

                <p><label>Thumbnail</label><input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}" placeholder="Thumbnail"/></p>
                @if(isset($post->thumbnail))
                    <p class="alert alert-default"><a href="{{asset("storage/" . $post->thumbnail)}}" target="blank">View current thumbnail</a></p>
                @endif

                <p>
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Job description" rows="10">{!!$post->description!!}</textarea></p>
                <input type="hidden" value="{{$post->id}}" name="id">

                <div class="row">
                    <div class="col-md-6">
                        <p><input type="submit" class="btn btn-default" value="Update"></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p><a href="/post/delete/{{$post->id}}" style="text-align:right; padding: 1.25rem; line-height: 1; border-radius: 0; text-transform: uppercase;" class="btn btn-danger confirm">Delete job</a></p>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="{{ asset('js/tinymce/tinymce.min.js')}}"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>


$(function() {
    $('.confirm').click(function() {
        return window.confirm("Are you sure?");
    });

    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });

});

</script>
@endsection
