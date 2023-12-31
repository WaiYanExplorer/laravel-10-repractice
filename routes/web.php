<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    // ============ Shown with three methods (Raw SQL, Query Builder, Eloquent ORM) =============

    // -------- Fetch data --------
    // $users = DB::select("select * from users where id=2");
    // $users = DB::table('users')->where("id", 1)->get();
    // $users = User::where('id', 1)->get();

    // -------- Insert data --------
    // $users = DB::insert("insert into users (name, email, password) values (?, ?, ?)", ["Banana", "banana123@gmail.com", '12345678']);
    // $users = DB::table('users')->insert([
    //     "name" => "wai yan lin",
    //     "email" => "waiyanlin.mm.mdy@gmail.com",
    //     "password" => "12345678"
    // ]);
    // $users = User::create([
    //     "name" => "wai yan lin",
    //     "email" => "waiyanlin.mm.mdy@gmail.com",
    //     "password" => "12345678"
    // ]);

    // -------- Update data --------
    // $users = DB::update("update users set name='Orange' where id=2");
    // $users = DB::table('users')->where("id", 3)->update(["email" => "waiyanlin@gmail.com"]);
    // $users = User::where('id', 4)->update(['email' => 'waiyanlin@gmail.com']);

    // -------- Delete data --------
    // $users = DB::delete("delete from users where id=2");
    // $users = DB::table('users')->where("id", 3)->delete();
    // $users = User::where('id', 4)->delete();

    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
