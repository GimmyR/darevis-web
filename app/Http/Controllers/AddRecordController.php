<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRecordRequest;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AddRecordController extends Controller
{
    public function addRecord(): Response {

        return Inertia::render("AddRecord");

    }

    public function doAddRecord(AddRecordRequest $request) {

        $errors = [ "global" => null ];

        $inputs = $request->all();

        if($this->validateRecord($inputs)) {

            /** @var User $user */
            $user = Auth::user();
            
            /** @var Record $record */
            $record = $user->records()->create([
                "created_at" => $inputs["created_at"],
                "title" => $inputs["title"]
            ]);

            $record->parameters()->createMany($inputs["parameters"]);

            return redirect()->route("record.show", [ "id" => $record->id ]);

        } else $errors["global"] = "Your record is not valid.";

        return redirect()->route("add_record.form")->withErrors($errors);

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
