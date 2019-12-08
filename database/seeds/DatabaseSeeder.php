<?php
# @Date:   2019-10-22T15:38:37+01:00
# @Last modified time: 2019-10-22T17:20:17+01:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     // This function is used to seed all seeders to the database
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(InsuranceCompanySeeder::class);

    }
}
