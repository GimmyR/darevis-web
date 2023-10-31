<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RecordController extends Controller
{
    public function show(string $id) {

        /** @var Record $record */
        $record = Record::where("id", $id)->first();
        $parameters = $record->parameters()->orderBy("id")->get();
        $entries = $record->entries()->with("entryDetails")->orderBy("created_at")->get();

        return Inertia::render("Record", [
            "user" => Auth::user(),
            "record" => $record,
            "parameters" => $parameters,
            "entries" => $entries
        ]);

    }
}
