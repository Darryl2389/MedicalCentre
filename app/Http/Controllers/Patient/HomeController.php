<?php

namespace App\Http\Controllers\Patient;

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
      $this->middleware('role:patient');
  }

  public function index(){

    $date = Carbon::now();
    $user = Auth::user();
    $visits = Visit::where('patient_id', $user->patient->id)->get();

    return view('patient.home')->with([
      'visits' => $visits,
      'date' => $date

    ]);
    }

  }
