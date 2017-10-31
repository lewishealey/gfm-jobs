@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$post->title}}</h2>
            <p class="user__job__info"><i class="material-icons">label</i>{{$post->category}}</p>
            <p class="user__job__info"><i class="material-icons">business</i> {{$post->brand}}</p>
            <p class="user__job__info"><i class="material-icons">location_on</i> {{$post->location}}</p>
            <p class="user__job__info"><i class="material-icons">link</i>{{url("/job/{$post->slug}/{$post->id}")}}</p>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Applications</h3>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>-</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Heard about us</th>
                    <th>Download CV</th>
                    <th>Status</th>
                    <th>Date/time</th>
                </tr>
                @foreach($post->applications as $application)
                    <tr>
                        @if($application->accepted == 1)
                            <td class="admin__application__accept">
                                <i class="material-icons">check</i>
                            </td>
                        @endif
                        @if($application->rejected == 1)
                            <td class="admin__application__reject">
                                <i class="material-icons">close</i>
                            </td>
                        @endif

                        @if($application->accepted == NULL && $application->rejected == NULL)
                            <td class="admin__application__nothing">
                                <i class="material-icons">remove</i>
                            </td>
                        @endif
                        <td> {{$application->first_name}} {{$application->last_name}}</td>
                        <td><a href="mailto:{{$application->email}}">{{$application->email}}</a></td>
                        <td>{{$application->phone}}</td>
                        <td>{{$application->hear}}</td>
                        <td><a href="{{asset("storage/" . $application->cv)}}" class="btn btn-info">Download CV</a></td>
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
                        <td>
                            {{$application->created_at}}
                        </td>
                    </tr>
                @endforeach
            </table>
            </ul>
        </div>

    </div>

</div>

@endsection
