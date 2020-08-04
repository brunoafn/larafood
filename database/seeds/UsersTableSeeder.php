<?php

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companie = Company::first();

        $companie->users()->create([
            'name' => 'gamarra',
            'email' => 'gamarra@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
