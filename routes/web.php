<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', [EquipmentController::class, "equipment"])->name("adminn.equipment");

Route::controller(AdminController::class)->group(function(){
    Route::get('/', 'equipment')->name("equipment.equipment");
    Route::get('/user', 'user')->name("user.user");
    Route::get('/checkboox', 'check')->name("checkboox.check");
    
    // update & delete 
    Route::put('/equipment/update_eq{equipment}', 'update_eq')->name("equipment.update_eq");
    Route::delete('/equipment/destroy{equipment}', 'eq_destroy')->name("equipment.eq_destroy");
    // end update & delete 

    
});

Route::post('/equipment/store' , [AdminController::class , "store_equipment"])->name("equipment.store_equipment");
Route::post('/equipment/store' , [AdminController::class , "store_eq"])->name("equipment.store_eq");


Route::post('/equipment/check' , [AdminController::class , "store_check"])->name("equipment.store_check");

// Route::delete("/equipment/destroy{equipment}",[AdminController::class , "eq_destroy"])->name("equipment.eq_destroy");
// Route::put('',[AdminController::class ,""])->name("equipment.update_eq");



