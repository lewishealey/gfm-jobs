@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <h3 class="user__title"> <svg width="29px" height="28px" viewBox="0 0 29 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		    <g id="Wireframes" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		        <g id="Desktop-/-Our-brands" transform="translate(-504.000000, -146.000000)" fill-rule="nonzero" fill="#EB8213">
		            <g id="Group-2" transform="translate(504.000000, 133.000000)">
		                <path d="M29,26.84996 L27.6181823,20.8516653 L23.9566991,20.4487427 L23.0254741,19.2917634 L23.4449148,15.6683982 L17.8464391,13 L15.2474647,15.5813493 L13.7525353,15.5813493 L11.1528192,13 L5.55508523,15.6687655 L5.97452588,19.2921307 L5.04330089,20.44911 L1.38181772,20.8520326 L0,26.84996 L3.12003018,28.785972 L3.45306086,30.2287067 L1.48788317,33.3128829 L5.36335154,38.1237128 L8.83643874,36.9142104 L10.1833958,37.5566093 L11.3931353,41 L17.6064939,41 L18.8162334,37.5566093 L20.1631904,36.9142104 L23.6362776,38.1237128 L27.511746,33.3128829 L25.5465683,30.2287067 L25.8792281,28.785972 L29,26.84996 Z M24.7855672,33.1633938 L22.8830646,35.5251007 L20.0300523,34.5315677 L17.0186836,35.9680585 L16.0247836,38.7958627 L12.9752164,38.7958627 L11.9813164,35.9680585 L8.9699477,34.5315677 L6.11693543,35.5251007 L4.21443278,33.1633938 L5.8287786,30.6301602 L5.08335358,27.4038409 L2.52146502,25.8138208 L3.1997647,22.8692167 L6.20705398,22.5382839 L8.29016458,19.9503234 L7.94526644,16.9748665 L10.6933258,15.6647253 L12.8287274,17.7851193 L16.1709017,17.7851193 L18.3059325,15.6647253 L21.0543627,16.9744992 L20.7094646,19.9499561 L22.7925752,22.5379167 L25.7998644,22.8688494 L26.4781641,25.8134535 L23.9155338,27.4034736 L23.1715923,30.6301602 L24.7855672,33.1633938 Z M14.5001854,21.6633872 C11.4272542,21.6633872 8.93731217,24.1290386 8.93731217,27.1728123 C8.93731217,30.216586 11.4272542,32.6822374 14.5001854,32.6822374 C17.5731166,32.6822374 20.0630587,30.216586 20.0630587,27.1728123 C20.0630587,24.1290386 17.5731166,21.6633872 14.5001854,21.6633872 Z M14.5001854,31.0294098 C12.3529164,31.0294098 10.6061741,29.2994504 10.6061741,27.1728123 C10.6061741,25.0461742 12.3529164,23.3162148 14.5001854,23.3162148 C16.6474545,23.3162148 18.3941967,25.0461742 18.3941967,27.1728123 C18.3941967,29.2994504 16.6474545,31.0294098 14.5001854,31.0294098 Z" id="Shape-Copy"></path>
		            </g>
		        </g>
		    </g>
		</svg>
		Current Vacancies</h3>
        </div>
    </div>
	<div class="row">

		<div class="col-md-12">
			<ul class="user__jobs">
				@if(count($posts) > 0)
					<li class="user__jobs--header">
				        <div class="user__jobs__title">
				        	Job title
				        </div>
				        <div>
				        	Category
				        </div>
				        <div>
				        	Brand
				        </div>
				        <div class="user__jobs__apply">
				        	&nbsp;
				        </div>
				    </li>
					@foreach($posts as $post)
					    <li>
					    	<a href="{{url("/job/{$post->slug}/{$post->id}")}}" title="View job {{$post->title}}">
						        <div class="user__jobs__title">
						        	{{$post->title}}
						        </div>
						        <div>
						        	{{$post->category}}
						        </div>
						        <div>
						        	{{$post->brand}}
						        </div>
						        <div class="user__jobs__apply">
						        	Apply <i class="material-icons">arrow_forward</i>
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