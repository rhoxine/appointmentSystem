<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
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



// viewspages
Route::get('/home', function () {
    return view('client_side/homepage');
});

Route::get('/contact', function () {
    return view('client_side/contact_us');
});

Route::get('/about', function () {
    return view('client_side/about_us');
});

Route::get('/inventory', function () {
    return view('admin_side/inventory');
});


Route::get('/inquiries', function () {
    return view('admin_side/inquiries');
});


Route::get('/appointments/{client_id}', [AppointmentController::class, 'showDetails'])->name('admin_side/edit_client_status');
Route::post('/update-status/{client_id}', [AppointmentController::class, 'updateStatus'])->name('update_status');


Route::get('/admin_login', function(){
    return view('admin_side/login');
});

Route::get('/register', [AuthenticateController::class, 'show']);
Route::post('/register', [AuthenticateController::class, 'store']);


Route::get('/login_page', [AuthenticateController::class, 'show_login']);
Route::post('/login_page', [AuthenticateController::class, 'check_login']);


//calendar view 
Route::get('appointment', [CalendarController::class, 'showCalendar'])->name('client_side/appointment');

//return and retrieved the users views
Route::get('/users', [UserController::class, 'get_users']);

//adding user
Route::post('/adduser', [UserController::class, 'store']);

//deleting a user
Route::get('/users/{user_id}/delete', [UserController::class, 'destroy'])->name('users.delete');

//update user
Route::get('/users/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update{id}', [UserController::class, 'update'])->name('users.update');


//return the users views
Route::get('/services', [ServicesController::class, 'get_services']);

//adding service
Route::post('/addservice', [ServicesController::class, 'store'])->name('services.store');
//delete service
Route::get('/service/{service_id}/delete', [ServicesController::class, 'destroy'])->name('services.delete');

Route::get('/services/{service_id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
Route::post('/services/update{id}', [ServicesController::class, 'update'])->name('services.update');


Route::post('/addcategory', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category', [CategoryController::class, 'get_categories']);
Route::get('/category/{category_id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');


Route::get('/appointment', [AppointmentController::class, 'showAppointmentForm']);
Route::post('/appointment',[AppointmentController::class, 'store_appointment'])->name('appointment.store');

Route::get('/admin', [AppointmentController::class, 'get_appointments'])->name('client_side.list_appointments');

//return the users views
Route::get('/list_appointments', [AppointmentController::class, 'get_appointments']);


Route::get('/generate-report', [AppointmentController::class, 'generateReport'])->name('generate_report');
Route::post('/generate-report', [AppointmentController::class, 'generateReport'])->name('generate_report');

