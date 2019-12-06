<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;

class VisitController extends Controller
{
  public function __construct()

{
    $this->middleware('auth');
    $this->middleware('role:patient');
}
  public function index()
  {
    $user = Auth::user();
    $visits = Visit::where('patient_id', $user->patient->id)->get();

    return view('patient.visits.index')->with([
      'visits' => $visits
    ]);
  }

  public function show($id)
  {
    $visit = Visit::findOrFail($id);

    return view('patient.visits.show')->with([
      'visit' => $visit
    ]);
  }

  public function destroy($id)
  {
    $visit = Visit::findOrFail($id);

    $visit->delete();

    return redirect()->route('patient.visits.index');
  }
}
