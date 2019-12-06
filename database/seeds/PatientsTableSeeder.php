<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Patient;
use Illuminate\Support\Str;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_patient = Role::where('name','patient')-> first();
      $random = Str::random();

      foreach ($role_patient->users as $user) {
      $patient = new Patient();
      $patient->address = rand(1,50).' Meadow Lane' or rand(1,50).'West Avenue';
      $patient->phone_number = '0871234567';
      $patient->insurance_yes = '1';
      $patient->insurance_id = rand(1,5);
      $patient->policy_no = rand(1234,8000);
      $patient->user_id = $user->id;
      $patient->save();
    }
  }
}
