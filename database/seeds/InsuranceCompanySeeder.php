<?php

use Illuminate\Database\Seeder;
use App\InsuranceCompany;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {
          factory(App\InsuranceCompany::class, 5)->create();
      }
    }
