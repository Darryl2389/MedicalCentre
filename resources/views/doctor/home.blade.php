@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$date->toRfc850String()}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi {{Auth::user()->name}}

                </div>
            </div>
        <hr>
        <div class="card-header bg-dark text-white">
          Upcoming Visits: {{$total_visits}}
          <!-- disabling add visit button for patients -->
          <!-- <a href="{{route('doctor.visits.create')}}" class="btn btn-primary float-right">Add</a> -->
        </div>
        <div class="card-body bg-light">
          @if (count($visits) === 0)
          <p> There are no Visits</p>
          @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Patient</th>
              <th>Date</th>
              <th>Time</th>
              <th></th>
            </thead>
            <tbody>
              @foreach ($visits as $visit)
              <tr data-id="{{ $visit->id }}">
                <td>{{ $visit->patient->user->name }}</td>
                <td>{{ $visit->date}}</td>
                <td>{{ $visit->time}}</td>
                <td>
                  <a href="{{ route('doctor.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
                  <a href="{{ route('doctor.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('doctor.visits.destroy',$visit->id)}}">
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
@endsection
