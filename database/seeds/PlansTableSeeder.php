<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'busines',
            'url' => 'busines.com.br',
            'price' => 499.99,
            'description' => 'plano empresarial',
        ]);
    }
}
