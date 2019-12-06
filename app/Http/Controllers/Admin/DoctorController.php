<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Role;


class DoctorController extends Controller
{
  public function __construct()

{
    $this->middleware('auth');
    $this->middleware('role:admin');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $doctors = Doctor::all();
      $doctors = Doctor::paginate(5);

      return view('admin.doctors.index')->with([
        'doctors' => $doctors
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $role_doctor = Role::where('name', 'doctor')->first();

      $request->validate([
      'name' => 'required|max:191',
      'email' => 'required|max:191',
      'start_date' => 'required|max:191',
]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_doctor);


      $doctor = new Doctor();
      $doctor->start_date = $request->input('start_date');
      $doctor->user_id = $user->id;
      $doctor->save();

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.show')->with([
        'doctor' => $doctor
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
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.edit')->with([
          'doctor' => $doctor,
]);
}
      public function update(Request $request, $id)
{

      $doctor = Doctor::findOrFail($id);
      $user = User::findOrFail($doctor->user_id);

      $request->validate([
              'name' => 'required|max:191',
              'email' => 'required|max:191',
              'start_date' => 'required|max:191'
            ]);

      $doctor->start_date = $request->input('start_date');
      $doctor->save();

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->save();

      return redirect()->route('admin.doctors.index');
    }


    public function destroy($id)
    {

      $user = User::findOrFail($id);

      $user->delete();

      return redirect()->route('admin.doctors.index');
    }
}
