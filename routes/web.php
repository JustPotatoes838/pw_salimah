<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});


Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    return back()->with('error', 'Login gagal');
});

Route::get('/dashboard', function () {
    return "LOGIN BERHASIL 🔥";
})->middleware('auth');

Route::get('/admin', function () {

    if (Auth::user()->role != 'admin') {
        abort(403);
    }

    return "HALAMAN ADMIN 👑";

})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user'
    ]);

    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});