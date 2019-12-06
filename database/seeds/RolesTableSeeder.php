<?php
# @Date:   2019-10-22T17:10:24+01:00
# @Last modified time: 2019-10-23T11:33:50+01:00




use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Administrator';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'A Patient';
        $role_user->save();

        $role_doctor = new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'A Doctor';
        $role_doctor->save();

        $role_patient = new Role();
        $role_patient->name ='patient';
        $role_patient->description = 'A Patient';
        $role_patient->save();


    }
}
