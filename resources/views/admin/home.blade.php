@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Jobs dashboard</h2>

            <ul class="admin__jobs">
				@if(count($posts) > 0)
					@foreach($posts as $post)
					    <li>
					        <div class="jobs__title">
					        	<a href="{{url("/post/edit/{$post->id}")}}" title="View job {{$post->title}}">
						        	{{$post->title}}
						        </a>
					        </div>
					        <div>
					        	{{count($post->applications)}} applications
					        </div>
					        <div>
					        	{{$post->category}}
					        </div>
					        <div>
					        	{{$post->brand}}
					        </div>
					        <div class="jobs__edit">
					        	<a href="{{url("/post/{$post->id}/applications")}}" class="btn btn-success" title="Applications for {{$post->title}}">
					        		Applications
					        	</a>
					        	<a href="{{url("/post/edit/{$post->id}")}}" class="btn btn-info" title="Edit job {{$post->title}}">
					        		Edit
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
