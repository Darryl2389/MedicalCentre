@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <!-- changing date field to unique format -->
                <div class="card-header">{{$date->toRfc850String()}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- displaying currently logged in users name -->
                    Hi {{Auth::user()->name}}

                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
