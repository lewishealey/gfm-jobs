@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-12">
			<h2>Your application has been submitted</h2>
			<p>{{$application->first_name}}, thank you for applying for the role of {{$application->post->title}}</p>
			<p>A member of staff will let you know as soon as possible if you have successfully made it through to the interview stage.</p>
			<p>Any questions please contact us at: <a href="mailto:recruitment@gfmc.co.uk" title="Email recruitment at GFM">recruitment@gfmc.co.uk</a> or call us on: 01206 791733</p>
		</div>
	</div>
</div>
@endsection 