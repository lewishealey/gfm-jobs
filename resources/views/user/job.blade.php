@extends('layouts.app')

@section('content')

<div class="user__job__header"></div>

<div class="container">
	<div class="row justify-content-between">
		<div class="col-12 col-md-7">
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
				<a href="https://www.facebook.com/sharer/sharer.php?u={{url("/job/{$post->slug}/{$post->id}")}}" class="facebook" target="blank">
					<i class="fa fa-facebook"></i>
				</a><a href="https://twitter.com/home?status={{url("/job/{$post->slug}/{$post->id}")}}" class="twitter" target="blank">
					<i class="fa fa-twitter"></i>
				</a><a href="https://www.linkedin.com/shareArticle?mini=true&url={{url("/job/{$post->slug}/{$post->id}")}}&title={{$post->title}}&summary=&source=" class="linkedin" target="blank">
					<i class="fa fa-linkedin"></i>
				</a> 
			</div>

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
	                		<div class="form-group">
								<label>First name</label>
								<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="First name"/>
							</div>
	                	</div>
	                	<div class="col-md-6">
	                		<div class="form-group">
								<label>Last name</label>
								<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Last name"/>
							</div>
	                	</div>
	                </div>
	                
	                <div class="form-group">
						<label>Your email address</label>
						<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"/>
					</div>
	                <div class="form-group">
						<label>Your phone number</label>
						<input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone number"/>
					</div>
	                <div class="form-group">
						<label>How did you hear about us?</label>
						<input type="text" name="hear" class="form-control" value="{{ old('hear') }}" placeholder="Where did you hear about us?"/>
					</div>
	                <div class="form-group">
						<label>Upload CV</label>
						<input type="file" name="cv" class="form-control" value="{{ old('cv') }}" placeholder="Cv"/>
						<small>Only pdf, doc, docx files. Files should be under 2MB</small>
					</div>
	                <div class="form-group">
						<input type="submit" class="btn btn-default" value="Submit application">
					</div>
					<input type="hidden" name="post_id" class="form-control" value="{{$post->id}}" />

	            </form>
	        </div>
		</div>

		<div class="user__job__visual"></div>

	</div>

</div>

@endsection
