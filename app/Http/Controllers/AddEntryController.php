<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AddEntryController extends Controller
{
    public function addEntry(string $recordId) {

        $record = Record::where("id", $recordId)
                            ->with("parameters")
                            ->first();

        return Inertia::render("AddEntry", [
            "record" => $record
        ]);

    }

    public function doAddEntry(string $recordId, Request $request) {

        /** @var Record $record */
        $record = Record::where("id", $recordId)
                            ->where("user_id", Auth::user()->id)
                            ->first();

        if($record != null) {

            $inputs = $request->all();
            
            if($this->validateEntry($inputs["details"])) {

                /** @var Entry $entry */
                $entry = $record->entries()->create([
                    "created_at" => $inputs["created_at"],
                    "updated_at" => $inputs["created_at"]
                ]); $entry->entryDetails()->createMany($inputs["details"]);
                
                return redirect()->route("record.show", [
                    "id" => $recordId
                ]);

            } else return redirect()
                                ->route("add_entry.form")
                                ->withErrors([ "global" => "Entry is not valid." ]);

        } else return redirect()
                    ->route("add_entry.form")
                    ->withErrors([ "global" => "This record does not belong to you." ]);

    }

    private function validateEntry($details) {

        $validated = true;

        foreach($details as $detail) {

            if(!isset($detail["parameter_id"]) || $detail["parameter_id"] == null) {

                $validated = false;
                break;

            }

        } return $validated;

    }
}
