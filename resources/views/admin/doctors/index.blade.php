@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Doctors
          <a href="{{route('admin.doctors.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        <div class="card-body">
          @if (count($doctors) === 0)
          <p> There are no Doctors</p>
          @else
          <table id="table-doctors" class="table table-hover">
            <!-- table headings -->
            <thead>
              <th>Name</th>
              <th>Email</th>
              <th>Start Date </th>
            </thead>
            <tbody>
              <!-- this allows a display of both doctor and user information associated with the doctor user -->
              @foreach ($doctors as $doctor)
              <tr data-id="{{ $doctor->id }}">
                <td>{{ $doctor->user->name }}</td>
                <td>{{ $doctor->user->email }}</td>
                <td>{{ $doctor->start_date }}</td>
                <td>
                  <!-- view and edit buttons -->
                  <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-default">View</a>
                  <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.doctors.destroy', $doctor->user_id) }}">
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
        {{ $doctors->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
