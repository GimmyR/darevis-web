<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRecordRequest;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EditRecordController extends Controller
{
    public function editRecord(string $id) {

        /** @var Record $record */
        $record = Record::where("id", $id)
                            ->with("parameters")
                            ->first();

        if($record != null) {

            /** @var User $user */
            $user = Auth::user();

            if($record->user_id == $user->id)
                return Inertia::render("EditRecord", [
                    "record" => $record
                ]);

            else return redirect()->route("home");

        } else return redirect()->route("home");

    }

    public function doEditRecord(string $id, AddRecordRequest $request) {

        /** @var Record $record */
        $record = Record::find($id);

        if($record != null) {

            /** @var User $user */
            $user = Auth::user();

            if($record->user_id == $user->id) {

                $inputs = $request->all();

                if($this->validateRecord($inputs)) {

                    $this->modifyRecord($record, $inputs);
                    
                    return redirect()->route("record.show", [ "id" => $record->id ]);

                } else return redirect()->route("edit_record.form")->withErrors([ "global" => "Your record is not valid." ]);

            } else return redirect()->route("home");

        } else return redirect()->route("home");

    }

    private function modifyRecord(Record $record, $inputs) {

        $record->created_at = $inputs["created_at"];
        $record->title = $inputs["title"];
        $record->save();

        foreach($inputs["parameters"] as $parameter) {

            if(isset($parameter["id"]) && !isset($parameter["delete"])) {

                $param = $record->parameters()->find($parameter["id"]);
                $param->title = $parameter["title"];
                $param->unit = $parameter["unit"];
                $param->save();

            } else if(isset($parameter["id"]) && isset($parameter["delete"])) {

                $param = $record->parameters()->find($parameter["id"]);
                $param->delete();

            } else if(!isset($parameter["id"]))
                $record->parameters()->create($parameter);

        }

    }

    private function validateRecord($inputs) {

        $validated = true;

        if(isset($inputs["parameters"]))
            foreach($inputs["parameters"] as $parameter)
                if(!isset($parameter["title"]) || $parameter["title"] == null) {
                    $validated = false;
                    break;
                }

        return $validated;

    }
}
