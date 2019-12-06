@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Visits
          <!-- disabling add visit button for patients -->
          <!-- <a href="{{route('doctor.visits.create')}}" class="btn btn-primary float-right">Add</a> -->
        </div>
        <div class="card-body">
          @if (count($visits) === 0)
          <p> You have no scheduled visits</p>
          @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Doctor</th>
              <th>Patient</th>
              <th>Date</th>
              <th>Time</th>
              <th>Price</th>
            </thead>
            <tbody>
              @foreach ($visits as $visit)
              <tr data-id="{{ $visit->id }}">
                <td>{{ $visit->doctor->user->name }}</td>
                <td>{{ $visit->patient->user->name }}</td>
                <td>{{ $visit->date}}</td>
                <td>{{ $visit->time}}</td>
                <td>{{ $visit->price}}</td>
                <td>
                  <a href="{{ route('patient.visits.show', $visit->id) }}" class="btn btn-default">View</a>
                  <form style="display:inline-block" method="POST" action="{{route('patient.visits.destroy',$visit->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                  </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
