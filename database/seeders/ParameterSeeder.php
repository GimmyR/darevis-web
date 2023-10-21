<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

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
        ]);
        
    }
}
