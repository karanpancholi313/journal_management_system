<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\JmsUserController;

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
Route::get('/', function () { 
        return view('home');
});
  
Route::group(['middleware'=>'guest'],function(){
        Route::get('admin/login', function () {
            return view('admin/login');
        });
    Route::post('admin/login',[DataController::class,'login'])->name('login');
    });
    Route::get('admin/register',[DataController::class,'register_view']);
    Route::post('admin/register',[DataController::class,'register'])->name('register');
    Route::get('logout', [DataController::class, 'logout'])->name('logout');
    
    Route::group(['middleware'=>'auth'],function(){
     
        Route::get('admin/navbar', function () {
            return view('admin/navbar');
        }); 
     
         
    Route::get('admin/home', function () {
        return view('admin/home');
    }); 

    Route::prefix('admin/editers')->group(function () {
        Route::get('/', [JmsUserController::class, 'index']);
        Route::get('new', [JmsUserController::class, 'create']);
        Route::post('new', [JmsUserController::class, 'store']);
        Route::get('edit/{id}', [JmsUserController::class, 'edit']);
        Route::post('edit/{id}', [JmsUserController::class, 'update']);
        Route::get('changepassword/{id}', [JmsUserController::class, 'editpass']);
        Route::post('changepassword/{id}', [JmsUserController::class, 'updatepass']);
        Route::get('delete/{id}', [JmsUserController::class, 'delete']);
        Route::get('profile/{id}', [JmsUserController::class, 'profile']);
        Route::post('profile/{id}', [JmsUserController::class, 'profile_update']);
     });
    Route::prefix('admin/roles')->group(function () { 
        Route::get('/', [RolesController::class, 'index']);
        Route::get('/new', [RolesController::class, 'add_new']);
        Route::post('/new', [RolesController::class, 'store']);
        Route::get('/edit/{id}', [RolesController::class, 'edit']);
        Route::post('/edit/{id}', [RolesController::class, 'update']);
        Route::get('/delete/{id}', [RolesController::class, 'destroy']);
    });
    }); 