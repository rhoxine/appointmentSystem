<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ReportGenerationController;

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

//login route
Route::get('/', function() {
    return view('client_side.login_page');
});


Route::get('/homepage', function () {
    return view('client_side/home');
});

// routes/web.php

Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');



Route::get('/book', function () {
    return view('client_side/book_calendar');
});

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

// Route::get('/inventory', function () {
//     return view('admin_side/inventory');
// });


Route::get('/view_message', function () {
    return view('admin_side/view_message');
});


Route::get('/my_appointments', function () {
    return view('client_side/my_appointments');
});

Route::get('/appointments/{client_id}', [AppointmentController::class, 'showDetails'])->name('admin_side/edit_client_status');
Route::post('/update-status/{client_id}', [AppointmentController::class, 'updateStatus'])->name('update_status');


Route::get('/register', [AuthenticateController::class, 'show']);
Route::post('/usercreated', [AuthenticateController::class, 'store']);


Route::get('/login_page', [AuthenticateController::class, 'show_login']);
Route::post('/login_page', [AuthenticateController::class, 'check_login']);

Route::get('/admin_side/list_appointments', [AppointmentController::class, 'get_appointments'])->name('admin_side.list_appointments');


//calendar view 
Route::get('appointment', [CalendarController::class, 'showCalendar'])->name('client_side/appointment');

//return and retrieved the users views
Route::get('/users', [UserController::class, 'get_users']);

//adding user
Route::post('/adduser', [UserController::class, 'store_staff']);

//deleting a user
Route::get('/users/{user_id}/delete', [UserController::class, 'destroy'])->name('users.delete');

//update user
Route::get('/users/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update{id}', [UserController::class, 'update'])->name('users.update');

//return the users views get the services from dropdown
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


Route::get('/category/{category_id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');



Route::post('/addproduct', [InventoryController::class, 'store'])->name('product.store');
Route::get('/inventory', [InventoryController::class, 'get_products']);
Route::get('/inventory/{product_id}/delete', [InventoryController::class, 'destroy'])->name('product.delete');

Route::get('/inventory/{product_id}/edit', [InventoryController::class, 'edit'])->name('product.edit');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('product.update');


// Route::post('/updateQuantity', [InventoryController::class, 'updateQuantity'])->name('updateQuantity');




Route::post('/addinquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/inquiries', [InquiryController::class, 'get_inquiries']);

Route::get('/inquiry/{inquiry_id}/delete', [InquiryController::class, 'destroy'])->name('inquiry.delete');


Route::get('/inquiry/{inquiry_id}/edit', [InquiryController::class, 'edit'])->name('inquiry.edit');
Route::post('/inquiry/update{id}', [InquiryController::class, 'update'])->name('inquiry.update');

Route::get('/inquiry/{inquiry_id}', [InquiryController::class, 'viewMessage'])->name('admin_side/view_message');
// Route::post('/update-status/{inquiry_id}', [InquiryController::class, 'updateStatus'])->name('update_status');



Route::get('/appointment', [AppointmentController::class, 'showAppointmentForm']);
Route::post('/appointment', [AppointmentController::class, 'store_appointment'])->name('appointment.store');

Route::get('/admin', [AppointmentController::class, 'get_appointments'])->name('client_side.list_appointments');

//return the users views
Route::get('/list_appointments', [AppointmentController::class, 'get_appointments']);


Route::get('/generate-report', [ReportGenerationController::class, 'generateReport'])->name('generate_report');
Route::post('/generate-report', [ReportGenerationController::class, 'generateReport'])->name('generate_report');

Route::get('/client/appointments', [AppointmentController::class, 'getClientAppointments'])
    ->name('client.appointments');