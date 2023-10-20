<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Parameter;
use App\Models\Record;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {

        /*User::create([
            "name" => "gimmyraz",
            "email" => "gimmyarazafimbelo2@gmail.com",
            "password" => Hash::make("mdpGimmy")
        ]);

        Record::create([
            "user_id" => 1,
            "title" => "My Health"
        ]);

        Parameter::create([
            "record_id" => 1,
            "title" => "Sys",
            "unit" => "mmHg"
        ]);

        Parameter::create([
            "record_id" => 1,
            "title" => "Dia",
            "unit" => "mmHg"
        ]);

        Parameter::create([
            "record_id" => 1,
            "title" => "Pulse",
            "unit" => "/min"
        ]);

        Parameter::create([
            "record_id" => 1,
            "title" => "Weight",
            "unit" => "kg"
        ]);

        Parameter::create([
            "record_id" => 1,
            "title" => "Temperature",
            "unit" => "°C"
        ]);*/
        
    }
}
