<?php

use App\Http\Controllers\MonthlyBudgetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[MonthlyBudgetController::class, 'show_calculator']);

/*
Route::get('/user', function(){     
    return view('profile', ['user' => UserController::get_user_data()]);
})->name('user.show');

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::get('login', function(){
    if (Auth::check()) {
        return response('Already logged in');
    }
    return view('login');
})->name('login.show');

Route::post('login', function(){
    // process login data here    
    echo 'Successfully logged in ... ';
    return redirect('/user');
})->name('login.post');
*/