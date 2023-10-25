<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request) {

        /** @var User $user */
        $user = Auth::user();
        $inputs = $request->all();
        $records = Record::where("user_id", $user->id)
                            ->where("title", "ilike", "%".$inputs["search"]."%")
                            ->get();

        return Inertia::render("Search", [
            "user" => $user,
            "records" => $records
        ]);

    }
}
