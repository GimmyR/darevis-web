<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\EntryDetail;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EditEntryController extends Controller
{
    public function editEntry(Entry $entry) {

        /** @var Record $record */
        $record = $entry->record;

        /** @var User $user */
        $user = Auth::user();

        if($record->user_id == $user->id)
            return Inertia::render("EditEntry", [
                "user" => $user,
                "record" => $record,
                "parameters" => $record->parameters,
                "entry" => $entry,
                "details" => $entry->entryDetails
            ]);

        else return redirect()
                        ->route("home")
                        ->withErrors([ 
                            "global" => "You don't have permission to edit this record." 
                        ]);

    }

    public function doEditEntry(Entry $entry, Request $request) {

        /** @var Record $record */
        $record = $entry->record;

        /** @var User $user */
        $user = Auth::user();

        $inputs = $request->all();

        if($record->user_id == $user->id) {

            if(isset($inputs["created_at"]) && $inputs["created_at"] != null && $this->validateEntry($inputs["details"])) {

                $this->saveEntry($entry, $inputs);
                return redirect()->route("record.show", [ "id" => $record->id ]);

            } else return redirect()
                            ->route("edit_entry.form")
                            ->withErrors([ 
                                "global" => "Entry is not valid." 
                            ]);

        } else return redirect()
                        ->route("home")
                        ->withErrors([ 
                            "global" => "You don't have permission to edit this record." 
                        ]);

    }

    private function saveEntry(Entry $entry, $inputs) {

        $entry->created_at = $inputs["created_at"];
        $entry->save();
        
        foreach($inputs["details"] as $detail) {

            /** @var EntryDetail $d */
            $d = EntryDetail::find($detail["id"]);
            $d->value = $detail["value"];
            $d->save();

        }

    }

    private function validateEntry($details) {

        $validated = true;

        foreach($details as $detail) {

            if(!isset($detail["id"]) || $detail["id"] == null) {

                $validated = false;
                break;

            }

        } return $validated;

    }
}
