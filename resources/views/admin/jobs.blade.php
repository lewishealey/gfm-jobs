@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="jobs">
					@if(count($posts) > 0)
						@foreach($posts as $post)
						    <li>
						    	<a href="{{url("/job/{$post->slug}/{$post->id}")}}" title="View job {{$post->title}}">
							        <div>
							        	{{$post->title}}
							        </div>
							        <div>
							        	{{$post->brand}}
							        </div>
							        <div>
							        	View
							        </div>
							    </a>
						    </li>
					    @endforeach
				    @endif
				</ul>
			</div>
		</div>

	</div>

@endsection