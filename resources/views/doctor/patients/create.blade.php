@extends('layouts.app')





@section('content')
<div class ="container">
  <script type="text/javascript">

  function yesnoCheck() {
      if (document.getElementById('yesCheck').checked) {
          document.getElementById('ifYes').style.display = 'block';
      } else {
          document.getElementById('ifYes').style.display = 'none';
      }
    }

  </script>
  <div class="row">
    <div class ="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="header">
          Add new Patient
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
          <form method = "POST" action = "{{route('doctor.patients.store')}}">
            <input type ="hidden" name="_token" value="{{ csrf_token()}}">
            <div class="form-group">
              <label for ="title">Name</label>
              <input type ="text" class="form-control" id="name" name="name" value="{{old('name')}}"/>
            </div>
            <div class="form-group">
              <label for ="title">Email</label>
              <input type ="text" class="form-control" id="email" name="email" value="{{old('email')}}"/>
            </div>
            <div class="form-group">
              <label for ="title">Address</label>
              <input type ="text" class="form-control" id="address" name="address" value="{{old('address')}}"/>
            </div>
            <div class="form-group">
              <label for ="title">Phone Number</label>
              <input type ="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}"/>
            </div>
            <div class="form-group">
              <label for ="title">Insurance</label>
              <input id="yesCheck" type="radio" onclick="javascript:yesnoCheck();" name="insurance_yes" value="1" {{ old('model') === "1" ? 'checked' : (isset($patient->insurance) && $patient->insurance === '1' ? 'checked' : '') }}> Yes
              <input id="noCheck" type="radio" onclick="javascript:yesnoCheck();" name="insurance_yes" value="0" {{ old('model') === "0" ? 'checked' : (isset($patient->insurance) && $patient->insurance === '0' ? 'checked' : '') }}> No
            </div>
            <div class="form-group" id="ifYes" style="display:none">
              <label for ="title"> Insurance Company </label>
              <select class="form-control" name="insurance_id" id="insurance_id">
                @foreach ($insurances as $insurance)
                <option value="{{$insurance->id }}" {{old("$insurance->id")}}>
                  {{$insurance->name}}
                </option>
                @endforeach
              </select>
              <label for="title">Policy Number</label>
              <input type="text" class="form-control" id="policy_no" name="policy_no" value="{{old('policy_no')}}"/>
            </div>
            <a href="{{route('doctor.patients.index')}}" class="btn btn-link"> Cancel </a>
            <button type="submit" class="btn btn-primary float-right"> Submit </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
