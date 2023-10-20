<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RecordController extends Controller
{
    public function show(string $id) {

        $record = Record::where("id", $id)->with([ 
                                                "parameters", 
                                                "entries.entryDetails" 
                                            ])->first();

        return Inertia::render("Record", [
            "record" => $record
        ]);

    }
}
