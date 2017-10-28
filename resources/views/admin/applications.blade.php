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
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Applications</h4>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                @foreach($post->applications as $application)
                    <tr>
                        <td>{{$application->created_at}} {{$application->first_name}} {{$application->last_name}}</td>
                        <td><a href="mailto:{{$application->email}}">{{$application->email}}</a></td>
                        <td>{{$application->phone}}</td>
                        <td>{{$application->hear}}</td>
                        <td><a href="{{$application->cv}}" class="btn btn-info">Download CV</a></td>
                        @if($application->accepted == NULL && $application->rejected == NULL)
                            <td>
                                <a href="{{url("/application/accept/{$application->id}")}}" class="btn btn-success">Accept</a>
                                <a href="{{url("/application/reject/{$application->id}")}}" class="btn btn-danger">Reject</a>
                            </td>
                        @endif
                        @if($application->accepted == 1)
                            <td>
                                Accepted
                            </td>
                        @endif
                        @if($application->rejected == 1)
                            <td>
                                Rejected
                            </td>
                        @endif
                    </tr>
                @endforeach
            </ul>
        </div>

    </div>

</div>

@endsection
