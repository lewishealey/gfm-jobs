@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="user__jobs">
				@if(count($posts) > 0)
					@foreach($posts as $post)
					    <li>
					        <div class="user__jobs__title">
					        	<a href="{{url("/job/{$post->slug}/{$post->id}")}}" title="View job {{$post->title}}">
					        		{{$post->title}}
					        	</a>
					        </div>
					        <div>
					        	{{$post->category}}
					        </div>
					        <div>
					        	{{$post->brand}}
					        </div>
					        <div class="user__jobs__view">
					        	<a href="{{url("/job/{$post->slug}/{$post->id}")}}" class="btn btn-info" title="Apply to {{$post->title}}">
					        		Apply
					        	</a>
					        </div>
					    </li>
				    @endforeach
			    @endif
			</ul>
		</div>
	</div>

</div>

@endsection