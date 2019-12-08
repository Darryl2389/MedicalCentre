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
        // this factory is used to create 5 insurance company names to be input into the insurance_companies table
          factory(App\InsuranceCompany::class, 5)->create();
      }
    }
