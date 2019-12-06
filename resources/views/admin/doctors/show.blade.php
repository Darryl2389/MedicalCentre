@extends('layouts.app')
@section('content')




<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        {{$doctor->id}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Start Date</th>
            </tr>
            <tr>
              <td>{{$doctor->user->name}}</td>
              <td>{{$doctor->user->email}}</td>
              <td>{{$doctor->start_date}}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.doctors.index',$doctor->id) }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.doctors.edit',$doctor->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.doctors.destroy', $doctor->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
