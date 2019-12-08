<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use App\Role;
use App\Patient;
use App\Doctor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name','admin')->first();
      $role_user = Role::where('name','user')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();


      // These are a few users that was input to the database to display example data and also used for login testing
      $admin = new User();
      $admin->name = 'Darryl Sullivan';
      $admin->email = 'admin@medicalcentre.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'Darryl Sullivan';
      $user->email = 'darryls@medicalcentre.ie';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $patient = new User();
      $patient->name = 'John Doyle';
      $patient->email = 'JPatient@medicalcentre.ie';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $doctor = new User();
      $doctor->name = 'Dr.Sullivan';
      $doctor->email = 'drsullivan@medicalcentre.ie';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      factory(App\User::class,20)->create()->each(function($user){
        $user->roles()->attach(Role::where('name','doctor')->first());

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
});

factory(App\User::class,20)->create()->each(function($user){
  $user->roles()->attach(Role::where('name','patient')->first());

  $patient = new Patient();
  $patient->user_id = $user->id;
});
    }
}
