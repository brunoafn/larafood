<?php

use App\Models\Company;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->companies()->create([
            'cnpj' => '1234567890000',
            'name' => 'EspecializaTI',
            'email' => 'especializati@hotmail.com',
            'url' => 'especializati.com.br',
        ]);
    }
}
