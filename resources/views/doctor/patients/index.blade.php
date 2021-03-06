@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Patients
          <a href="{{route('doctor.patients.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        <div class="card-body">
          @if (count($patients) === 0)
          <p> There are no Patients</p>
          @else
          <table id="table-patients" class="table table-hover">
            <thead>
              <!-- table headings -->
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Insurance Company</th>
              <th>Policy Number</th>
            </thead>
            <tbody>
              <!-- creating a table to display patient information -->
              @foreach ($patients as $patient)
              <tr data-id="{{ $patient->id }}">
                <td>{{ $patient->user->name }}</td>
                <td>{{ $patient->user->email }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->insurance->name}}</td>
                <td>{{ $patient->policy_no }}</td>
                <td>
                  <!-- view,edit & delete buttons -->
                  <a href="{{ route('doctor.patients.show', $patient->id) }}" class="btn btn-default">View</a>
                  <a href="{{ route('doctor.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('doctor.patients.destroy', $patient->user_id) }}">
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
        {{ $patients->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
