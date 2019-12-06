@extends('layouts.app')
@section('content')




<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        {{$patient->id}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Insurance</th>
            </tr>
            <tr>
              <td>{{$patient->user->name}}</td>
              <td>{{$patient->user->email}}</td>
              <td>{{$patient->address}}</td>
              <td>{{$patient->insurance->name}}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.patients.index',$patient->id) }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.patients.edit',$patient->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.patients.destroy', $patient->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
