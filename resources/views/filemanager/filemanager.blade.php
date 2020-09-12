@extends('layouts.adminapp')

@section('content')
<section class="content">
<label for="exampleInputFile">Store Details</label>

@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Store Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>File Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                <tr>
                  <td>{{$file -> id}}</td>
                  <td>{{$file -> name}}</td>
                  <td>{{$file -> filename}}</a></td>
                  <td> <a href="{{ url('/deleterecord', ['id' => $file->id]) }}">
    <button class="btn btn-danger">Delete</button>
</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>File Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


</section>
@endsection
