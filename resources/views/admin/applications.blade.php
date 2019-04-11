@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="col-md-6">
            <p class="user__job__info"><i class="material-icons">label</i>{{$post->category}}</p>
            <p class="user__job__info"><i class="material-icons">business</i> {{$post->brand}}</p>
        </div>
        <div class="col-md-6">
            <p class="user__job__info"><i class="material-icons">location_on</i> {{$post->location}}</p>
            <p class="user__job__info"><i class="material-icons">link</i>{{url("/job/{$post->slug}/{$post->id}")}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Applications</h3>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>-</th>
                    <th>Name</th>
                    <th>Heard about us</th>
                    <th>Download CV</th>
                    <th>Date/time</th>
                    <th>Status</th>
                </tr>
                @foreach($post->applications as $application)
                    <tr>
                        @if($application->accepted == 1)
                            <td class="admin__application__accept">
                                <span class="badge badge-accept">Accepted</span>
                                @if($application->email_sent == 1)
                                    <span class="badge badge-contacted">Contacted</span>
                                @endif
                            </td>
                        @endif
                        @if($application->rejected == 1)
                            <td class="admin__application__reject">
                                <span class="badge badge-reject">Rejected</span>
                                @if($application->email_sent == 1)
                                    <span class="badge badge-contacted">Contacted</span>
                                @endif
                            </td>
                        @endif

                        @if($application->accepted == NULL && $application->rejected == NULL)
                            <td class="admin__application__nothing">
                                <i class="material-icons">remove</i>
                            </td>
                        @endif
                        <td>
                            <h4 class="admin__application__title">{{$application->first_name}} {{$application->last_name}}</h4>
                            {{$application->email}} - 
                            {{$application->phone}}
                        </td>
                        <td>{{$application->hear}}</td>
                        <td>
                            <a href="{{asset("storage/" . $application->cv)}}">
                                <span class="badge badge-download">Download <i class="material-icons">file_download</i></span>
                            </a>
                        </td>
                        <td>
                            {{$application->created_at->format('M d Y g:ia')}}
                        </td>
                        <td>
                            <a href="{{url("/application/accept/{$application->id}")}}" class="badge badge-accept {{$application->accepted == 1 ? ' disabled' : ''}}">Accept</a>
                            <a href="{{url("/application/reject/{$application->id}")}}" class="badge badge-reject {{$application->rejected == 1 ? ' disabled' : ''}}">Reject</a>
                        </td>
                    
                    </tr>
                @endforeach
            </table>
            </ul>
        </div>

    </div>

</div>

<div class="admin__faq">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>What are the tick, crosses and lines on the left?</h4>
                <p>That is a quick way to show who has been accepted and rejected. The grey line shows that no one has neither accepted or rejected the applicant.</p>
            </div>
            <div class="col-md-6">
                <h4>Why are table rows green?</h4>
                <p>It means you've either accepted or rejected the applicant and sent out an email response.</p>
            </div>
        </div>
    </div>
</div>

@endsection
