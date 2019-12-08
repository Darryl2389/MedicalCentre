<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // This function is used to create unique data for each doctor seeded to the database
    public function run()
    {
      $role_doctor = Role::where('name','doctor')-> first();

      foreach ($role_doctor->users as $user) {
      $doctor = new Doctor();
      $doctor->start_date = '1996/02/14';
      $doctor->user_id = $user->id;
      $doctor->save();
    }
  }
}
