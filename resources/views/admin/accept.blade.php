@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Accept {{$application->first_name}} {{$application->last_name}}</h2>
            <h4>Job: {{$application->post->title}}</h4>
        </div>
        <div class="col-md-12">
            <form action="/response/store" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p><input type="text" class="form-control" value="{{$application->email}}"></p>
                <p><textarea name="description" class="form-control" placeholder="Job description" rows="10">
                    @if(isset($response->contents))
                        {!!$response->contents!!}
                    @endif
                </textarea></p>
                <p>
                    <input type="submit" class="btn btn-primary" value="Send acceptance email">
                    <a href="{{url()->previous()}}" class="btn btn-default">Back to job</a>
                </p>

            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/tinymce/tinymce.min.js')}}"></script>

<script>

tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});

</script>
@endsection
