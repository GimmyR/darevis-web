<?php

use App\Http\Controllers\AddEntryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class, "index"])->middleware("auth")->name("home");

Route::prefix("/login")->name("login.")->controller(LoginController::class)->group(function() {

    Route::get("/", "loginForm")->name("loginForm");

    Route::post("/", "doLogin");

}); Route::get("/logout", [LoginController::class, "doLogout"])->name("logout");

Route::prefix("/record")->name("record.")->controller(RecordController::class)->group(function() {

    Route::get("/{id}/show", "show")->name("show")->middleware("auth");

});

Route::prefix("/add-entry")->name("add_entry.")->controller(AddEntryController::class)->group(function() {

    Route::get("/{recordId}", "addEntry")->name("form")->middleware("auth");

    Route::post("/{recordId}", "doAddEntry")->middleware('auth');

});