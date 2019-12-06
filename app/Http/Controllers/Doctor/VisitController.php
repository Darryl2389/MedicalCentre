<?php

namespace App\Http\Controllers\Doctor;

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
    $this->middleware('role:doctor');
}
  public function index()
  {
     $visits = Visit::all();
    $user = Auth::user();
    $visits = Visit::where('doctor_id',$user->doctor->id)->get();

    return view('doctor.visits.index')->with([
      'visits' => $visits
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $doctors = Doctor::all();
    $patients = Patient::all();

    return view('doctor.visits.create')->with([
        'doctors' => $doctors,
        'patients' => $patients
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
    'date' => 'required|max:191',
    'time' => 'required|max:191'
]);

    $visit = new Visit();
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->price = $request->input('price');
    $visit->save();

    return redirect()->route('doctor.visits.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $visit = Visit::findOrFail($id);

    return view('doctor.visits.show')->with([
      'visit' => $visit
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $patients = Patient::all();
    $doctors = Doctor::all();
    $visit = Visit::findOrFail($id);

    return view('doctor.visits.edit')->with([
      'patients' => $patients,
      'visit' => $visit,
      'doctors' => $doctors
  ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    $visit = Visit::findOrFail($id);
    $doctor = Doctor::findOrFail(Auth::user()->doctor->id);

    $request->validate([
    'date' => 'required|max:191',
    'time' => 'required',
    'patient_id' => 'required',
    'price' => 'required|max:4',

]);

    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $doctor->id;
    $visit->price = $request->input('price');
    $visit->save();

    return redirect()->route('doctor.visits.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $visit = Visit::findOrFail($id);

    $visit->delete();

    return redirect()->route('doctor.visits.index');
  }
}
