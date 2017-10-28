@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>{{$post->title}}</h1>
			<h2>{{$post->salary}}</h2>
			<p>{{$post->category}}</p>
			<p>{{$post->brand}}</p>
			<p>{{$post->location}}</p>
			<p>Url: {{url("/job/{$post->slug}/{$post->id}")}}</p>
			{!! $post->description !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h4>Apply now</h4>

			@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<form action="/application/store" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p><input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="First name"/></p>
                <p><input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Last name"/></p>
                <p><input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"/></p>
                <p><input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone number"/></p>
                <p><input type="text" name="hear" class="form-control" value="{{ old('hear') }}" placeholder="Wheere did you hear about us?"/></p>
                <p><input type="file" name="cv" class="form-control" value="{{ old('cv') }}" placeholder="Cv"/></p>
                <input type="hidden" name="post_id" class="form-control" value="{{$post->id}}" />
                <p><input type="submit" class="btn btn-primary" value="Create"></p>

            </form>
		</div>
	</div>

</div>

@endsection
