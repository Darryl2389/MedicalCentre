<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Visit;
use \Carbon\Carbon;

class HomeController extends Controller
  {
  public function __construct()

  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }

  public function index(){

    $date = Carbon::now();
    $user = Auth::user();
    $visits = Visit::where('doctor_id',$user->doctor->id)->get();
    $total_visits = Visit::where('doctor_id',$user->doctor->id)->count();

    return view('doctor.home')->with([
      'visits' => $visits,
      'date' => $date,
      'total_visits' => $total_visits
    ]);
    }

  }
