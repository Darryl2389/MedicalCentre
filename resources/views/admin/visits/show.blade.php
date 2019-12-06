@extends('layouts.app')
@section('content')




<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        {{$visit->id}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
              <th>Doctor</th>
              <th>Patient</th>
              <th>Date</th>
              <th>Time</th>
              <th>Price</th>
            </tr>
            <tr>
              <td>{{$visit->doctor->user->name}}</td>
              <td>{{$visit->patient->user->name}}</td>
              <td>{{$visit->date}}</td>
              <td>{{$visit->time}}</td>
              <td>{{$visit->price}}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.visits.index',$visit->id) }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.visits.edit',$visit->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.visits.destroy', $visit->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
