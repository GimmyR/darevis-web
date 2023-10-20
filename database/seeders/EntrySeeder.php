<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\EntryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        $entries = [
            [ "record_id" => 1, "created_at" => "2023-10-16 05:30:00" ],
            [ "record_id" => 1, "created_at" => "2023-10-17 05:30:00" ],
            [ "record_id" => 1, "created_at" => "2023-10-18 05:30:00" ],
            [ "record_id" => 1, "created_at" => "2023-10-19 05:30:00" ],
            [ "record_id" => 1, "created_at" => "2023-10-20 05:30:00" ]
        ];

        $details = [
            [
                [ "parameter_id" => 1, "value" => 115 ],
                [ "parameter_id" => 2, "value" => 81 ],
                [ "parameter_id" => 3, "value" => 75 ],
                [ "parameter_id" => 4, "value" => 67.1 ],
                [ "parameter_id" => 5, "value" => 35.8 ]
            ],
            [
                [ "parameter_id" => 1, "value" => 119 ],
                [ "parameter_id" => 2, "value" => 80 ],
                [ "parameter_id" => 3, "value" => 71 ],
                [ "parameter_id" => 4, "value" => 66.8 ],
                [ "parameter_id" => 5, "value" => 36.1 ]
            ],
            [
                [ "parameter_id" => 1, "value" => 121 ],
                [ "parameter_id" => 2, "value" => 87 ],
                [ "parameter_id" => 3, "value" => 72 ],
                [ "parameter_id" => 4, "value" => 66.8 ],
                [ "parameter_id" => 5, "value" => 36.1 ]
            ],
            [
                [ "parameter_id" => 1, "value" => 120 ],
                [ "parameter_id" => 2, "value" => 85 ],
                [ "parameter_id" => 3, "value" => 72 ],
                [ "parameter_id" => 4, "value" => 66.5 ],
                [ "parameter_id" => 5, "value" => 36.7 ]
            ],
            [
                [ "parameter_id" => 1, "value" => 121 ],
                [ "parameter_id" => 2, "value" => 87 ],
                [ "parameter_id" => 3, "value" => 82 ],
                [ "parameter_id" => 4, "value" => 66.8 ],
                [ "parameter_id" => 5, "value" => 36.1 ]
            ]
        ];

        for($i = 0; $i < count($entries); $i++) {

            $entry = Entry::create($entries[$i]);

            foreach($details[$i] as $detail) {

                $detail["entry_id"] = $entry->id;
                EntryDetail::create($detail);

            }

        }
        
    }
}
