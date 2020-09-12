@extends('layouts.adminapp')

@section('content')
<section class="content">
<form method='post' action="{{ route('storedata') }}" enctype="multipart/form-data">
@csrf
<label for="exampleInputFile">Upload files</label>

@if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



            <div class="box-body">

              <div class="form-group">
                <label for="exampleInputFile">File Name  :</label>
                <input type="text" name="filename"  class="form-control" placeholder="File Name" >
              </div>

              <div class="form-group">
              <div class="alert alert-info">
                <strong>Info!</strong> size: 2 MB, Format: txt,doc,docx,pdf,png,jpeg,jpg,gif
              </div>
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="uploadfilename" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

            </div>
            <input type='submit' name='submit' value='Upload file' class="btn btn-primary">
          </form>

</section>
@endsection
