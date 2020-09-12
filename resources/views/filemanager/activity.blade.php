@extends('layouts.adminapp')

@section('content')
<section class="content">
<label for="exampleInputFile">Activity Log</label>


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Activity Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>date</th>
                  <th>Activity</th>
                  <th>Done by</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                <tr>
                  <td>{{$log->id}}</td>
                  <td>{{$log->created_at}}</td>
                  <td>{{$log->activity}}</a></td>
                  <td>{{$log->doneby}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                  <th>id</th>
                  <th>date</th>
                  <th>Activity</th>
                  <th>Done by</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


</section>
@endsection
