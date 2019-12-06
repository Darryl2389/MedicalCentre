@extends('layouts.app')





@section('content')
<div class ="container">
  <div class="row">
    <div class ="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="header">
          Create an Appointment
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method = "POST" action = "{{route('doctor.visits.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="form-group">
              <label for ="title">Date</label>
              <input type ="date" class="form-control" id="name" name="date" value="{{old('date')}}"/>
            </div>
            <div class="form-group">
              <label for ="title">Time</label>
              <input type ="time" class="form-control" id="email" name="time" value="{{old('time')}}"/>
            </div>
            <div class="form-group">
            <label for ="title"> Doctor </label>
            <br>
            <select class = "form-control" name="doctor_id">
              @foreach ($doctors as $doctor)
              <option value="{{ $doctor->id }}" {{old("$doctor->id")}}>
                {{$doctor->user->name}}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for ="title"> Patient </label>
          <br>
          <select class = "form-control" name="patient_id">
            @foreach ($patients as $patient)
            <option value="{{ $patient->id }}" {{old("$patient->id")}}>
              {{$patient->user->name}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for ="title">Price</label>
          <input type ="text" class="form-control" id="price" name="price" value="{{old('price')}}"/>
        </div>
            <a href="{{route('doctor.visits.index')}}" class="btn btn-link"> Cancel </a>
            <button type="submit" class="btn btn-primary float-right"> Submit </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
