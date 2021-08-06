<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1,100) as $user){
            $date = Carbon::now()->subDays(rand(0,6));
            
            User::insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $date,
                'password' => bcrypt('123'),
                'remember_token' => Str::random(10),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
