@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medical Centre</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: red;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <div class="card-group">
                  <div class="card shadow p-3 mb-5 bg-white rounded-lg">
                    <a href="{{ route('patient.home') }}">
                    <img class="card-img-top" src="https://t4.ftcdn.net/jpg/00/86/77/09/240_F_86770989_eRWUg3bzOuzEIAgy9StCbfkuxP1KRJOw.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Patient</h5>
                      <p class="card-text">Please Click Here to login for Patients</p>
                    </div>
                  </div>
                  <div class="card shadow p-3 mb-5 bg-white rounded-lg">
                    <a href="{{ route('doctor.home') }}">
                    <img class="card-img-top" src="https://t4.ftcdn.net/jpg/02/06/09/31/240_F_206093179_FIiDttOFxVd6XJpv6xqprrNvCjjbRSGX.jpg" height="176" alt="Card image cap">

                    <div class="card-body">
                      <h5 class="card-title">Doctor</h5>
                      <p class="card-text">Please Click Here to login for Doctors</p>
                    </div>
                  </div>

                  <div class="card shadow p-3 mb-5 bg-white rounded">
                    <a href="{{ route('admin.home') }}">
                    <img class="card-img-top" src="https://t3.ftcdn.net/jpg/02/62/28/66/240_F_262286632_ApqDVEVYHra3oxvRvqSBGXK6y0Tqq8Pq.jpg" height="176" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Administrator</h5>
                      <p class="card-text">Please Click Here to login for Administrators</p>
                    </div>
                  </div>
                </div>
                </div>
          </div>
    </body>
</html>
@endsection
