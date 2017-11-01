@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-between">
		<div class="col-12 col-md-6">
			<h1 class="user__job__title">{{$post->title}}</h1>
			<h2 class="user__job__salary">{{$post->salary}}</h2>
			<p class="user__job__info"><i class="material-icons">label</i>{{$post->category}}</p>
			<p class="user__job__info"><i class="material-icons">business</i> {{$post->brand}}</p>
			<p class="user__job__info"><i class="material-icons">location_on</i> {{$post->location}}</p>
			<p class="user__job__info"><i class="material-icons">link</i>{{url("/job/{$post->slug}/{$post->id}")}}</p>

			<div class="user__job__description">
				{!! $post->description !!}
			</div>

			<div class="user__job__share">
				<h4>Share this job</h4>
				<a href="#">Facebook</a> <a href="#">Twitter</a> <a href="#">Linkedin</a>
			</div>
		</div>

		<div class="col-12 col-md-offset-1 col-md-5">

			<div class="user__job__apply" id="apply">
				<h3 class="user__job__apply-title">Apply now</h3>

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
	                <div class="row">
	                	<div class="col-md-6">
	                		<p><input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="First name"/></p>
	                	</div>
	                	<div class="col-md-6">
	                		<p><input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Last name"/></p>
	                	</div>
	                </div>
	                
	                <p><input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"/></p>
	                <p><input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone number"/></p>
	                <p><input type="text" name="hear" class="form-control" value="{{ old('hear') }}" placeholder="Where did you hear about us?"/></p>
	                <p><input type="file" name="cv" class="form-control" value="{{ old('cv') }}" placeholder="Cv"/></p>
	                <input type="hidden" name="post_id" class="form-control" value="{{$post->id}}" />
	                <p><input type="submit" class="btn btn-default" value="Submit application"></p>

	            </form>
	        </div>
		</div>
	</div>

</div>

@endsection
