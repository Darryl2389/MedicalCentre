<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Role;
use App\User;
use App\InsuranceCompany;

class PatientController extends Controller
{
  public function __construct()

{
    $this->middleware('auth');
    $this->middleware('role:admin');
}
    public function index()
    {
      $patients = Patient::all();
      $insurances = InsuranceCompany::all();
      $patients = Patient::paginate(5);

      return view('admin.patients.index')->with([
        'patients' => $patients,
        'insurances' => $insurances

      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurances = InsuranceCompany::all();

        return view('admin.patients.create')->with([
          'insurances' => $insurances
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
      $role_patient = Role::where('name', 'patient')->first();

      $request->validate([
      'name' => 'required|max:25',
      'email' => 'required|max:60',
      'address' => 'required|max:191',
      'phone_number' => 'required|max:191',
      'insurance_yes' => 'required'

]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_patient);


      $patient = new Patient();
      $patient->address = $request->input('address');
      $patient->phone_number = $request->input('phone_number');
      $patient->insurance_yes = $request->input('insurance_yes');
      // this if statement will bypass the insurance field if the 'NO' radio button is selected
      if($request->input('insurance_yes')){
        $patient->insurance_id = $request->input('insurance_id');
        $patient->policy_no = $request->input('policy_no');
      }
      $patient->user_id = $user->id;
      $patient->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);

      return view('admin.patients.show')->with([
        'patient' => $patient
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
      $insurances = InsuranceCompany::all();

      return view('admin.patients.edit')->with([
        'patient' => $patient,
        'insurances' => $insurances
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
      $patient = Patient::findOrFail($id);
      $user = User::findOrFail($patient->user_id);

      $request->validate([
              'name' => 'required|max:191',
              'email' => 'required|max:191',
              'address' => 'required|max:191',
              'phone_number' => 'required|max:191',
              'insurance_yes' => 'required'
            ]);

      $patient->address = $request->input('address');
      $patient->phone_number = $request->input('phone_number');
      $patient->insurance_yes = $request->input('insurance_yes');
      $patient->insurance_id = $request->input('insurance_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->save();

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);

      $user->delete();

      return redirect()->route('admin.patients.index');
    }
}
