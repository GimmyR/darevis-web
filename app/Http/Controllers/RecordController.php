<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RecordController extends Controller
{
    public function show(string $id) {

        $record = Record::where("id", $id)->with([ 
                                                "parameters", 
                                                "entries.entryDetails" 
                                            ])->first();

        return Inertia::render("Record", [
            "user" => Auth::user(),
            "record" => $record
        ]);

    }
}
