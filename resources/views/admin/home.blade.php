@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="user__title">Jobs dashboard</h2>

            <ul class="admin__jobs">
				@if(count($posts) > 0)
					@foreach($posts as $post)
					    <li>
					        <div class="jobs__title">
					        	<a href="{{url("/post/edit/{$post->id}")}}" title="View job {{$post->title}}">
						        	{{$post->title}}
						        </a>
					        </div>
					        <div class="jobs__applications">
					        	<a href="{{url("/post/{$post->id}/applications")}}"  title="Applications for {{$post->title}}">
						        	<i class="material-icons">supervisor_account</i> {{count($post->applications) == 0 ? "" : "View"}} {{count($post->applications)}} applications
						        </a>
					        </div>
					        <div class="jobs__edit">
					        	<a href="{{url("/post/edit/{$post->id}")}}" title="Edit job {{$post->title}}">
					        		<i class="material-icons">mode_edit</i>
					        	</a>
					        </div>
					    </li>
				    @endforeach
			    @endif
			</ul>

        </div>
    </div>
</div>

<div class="admin__faq">
	<div class="container">
		<div class="row">
	        <div class="col-md-4">
	        	<h4>How do I accept or reject applicants?</h4>
	        	<p>Simply click on the applications button and you will see a list of people that have applied. You can then decide whether you want to accept or reject them.</p>
	        </div>
	    </div>
	</div>
</div>
@endsection
