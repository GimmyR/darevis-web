<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View {

        /** @var User $user */
        $user = Auth::user();
        $records = Record::where("user_id", $user->id)->get();

        return view("home", [
            "records" => $records
        ]);

    }
}
