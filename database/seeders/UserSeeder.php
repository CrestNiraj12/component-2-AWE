<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Niraj Shrestha",
            'email' => "crestniraj@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("Crest123"),
        ]);
        
        User::factory(3)->create();
    }
}
