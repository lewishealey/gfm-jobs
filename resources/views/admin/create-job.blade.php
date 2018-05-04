@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="/post/store" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p><input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title"/></p>
                <p><input type="text" name="salary" class="form-control" value="{{ old('salary') }}" placeholder="Salary"/></p>
                <p>
                    <select name="hours" class="form-control">
                        <option {{ (old('hours') == "Full-time" ? "selected":"") }} value="Full-time">Full-time</option>
                        <option {{ (old('hours') == "Part-time" ? "selected":"") }} value="Part-time">Part-time</option>
                    </select>
                </p>
                <p><input type="text" name="extra" class="form-control" value="{{ old('extra') }}" placeholder="Any additional info?"/></p>

                <p><select name="category" class="form-control">
                    <option {{ (old('category') == "Customer Service" ? "selected":"") }} value="Customer Service">Customer service</option>
                    <option {{ (old('category') == "Management" ? "selected":"") }} value="Management">Management</option>
                    <option {{ (old('category') == "Design" ? "selected":"") }} value="Design">Design</option>
                </select>
                </p>
                <p>
                    <select name="brand" class="form-control">
                        <option {{ (old('brand') == "ClearComms" ? "selected":"") }} value="ClearComms">GFM Clearcomms</option>
                        <option {{ (old('brand') == "GFM" ? "selected":"") }} value="GFM">GFM</option>
                        <option {{ (old('brand') == "Breakfree Holidays" ? "selected":"") }} value="Breakfree Holidays">Breakfree Holidays</option>
                    </select>
                </p>
                 <p><input type="text" name="location" class="form-control" value="{{ old('location') ? old('location') : "Colchester" }}" placeholder="Location"/></p>
                <p><input type="file" name="attachment" class="form-control" value="{{ old('attachment') }}" placeholder="Attachment"/></p>
                <p><input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}" placeholder="Thumbnail"/></p>
                <p><textarea name="description" class="form-control" value="{{ old('description') }}" placeholder="Job description" rows="10"></textarea></p>

                <p><input type="submit" class="btn btn-default" value="Create job"></p>


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
