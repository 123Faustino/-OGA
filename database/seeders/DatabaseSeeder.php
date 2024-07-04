<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => "pedro",
            'last_name' => "joao",
            'username' => "felizardo",
            'gender' =>   "male",
            'profile' =>  "",
            'email' =>  "cahocofelizardo@gmail.com",
            'mobile' =>  "95127",
            'password' => Hash::make("password"),
            'relationship' => "single"
        ]);
    }
}
