<?php

namespace App\Http\Controllers\Admin;

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
    $this->middleware('role:admin');
}
  public function index()
  {
    $visits = Visit::all();
    $visits = Visit::paginate(5);

    return view('admin.visits.index')->with([
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

    return view('admin.visits.create')->with([
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

    return redirect()->route('admin.visits.index');
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

    return view('admin.visits.show')->with([
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
    $patient = Patient::findOrFail($id);
    $patients = Patient::all();
    $doctors = Doctor::all();
    $visit = Visit::findOrFail($id);

    return view('admin.visits.edit')->with([
      'patient' => $patient,
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

    $request->validate([
    'date' => 'required|max:191',
    'time' => 'required|max:191',
    'price' => 'required|numeric|max:6'
]);

    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->price = $request->input('price');
    $visit->save();

    return redirect()->route('admin.visits.index');
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

    return redirect()->route('admin.visits.index');
  }
}
