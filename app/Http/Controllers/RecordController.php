<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RecordController extends Controller
{
    public function show() {

        return Inertia::render("Record");

    }
}
