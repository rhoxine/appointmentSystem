<?php

use App\Models\SpecialCases;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\ReportGenerationController;
use App\Http\Controllers\SpecialCasesController;

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



// login route
// Route::get('/', function() {
//     return view('client_side.login_page');
// });


Route::get('/contact', function () {
    return view('client_side/contact_us');
});

Route::get('/about', function () {
    return view('client_side/about_us');
});

Route::get('/view_message', function () {
    return view('admin_side/view_message');
});

// Route::get('/admin/cases', [AppointmentController::class, 'get_cases'])->name('admin.cases');

Route::get('/my_appointments', function () {
    return view('client_side/my_appointments');
});

Route::get('/appointments/{client_id}', [AppointmentController::class, 'showDetails'])->name('admin_side/edit_client_status');
Route::post('/update-status/{client_id}', [AppointmentController::class, 'updateStatus'])->name('update_status');

Route::get('/list_appointment/{client_id}/delete', [AppointmentController::class, 'destroy'])->name('appointment.delete');



Route::get('/register', [AuthenticateController::class, 'show']);
Route::post('/usercreated', [AuthenticateController::class, 'store']);


Route::get('/login_page', [AuthenticateController::class, 'show_login']);
Route::post('/login_page', [AuthenticateController::class, 'check_login']);

Route::get('/admin/list_appointments', [AppointmentController::class, 'get_appointments'])->name('admin.list_appointments');


//calendar view 
Route::get('appointment', [CalendarController::class, 'showCalendar'])->name('client_side/appointment');

//return and retrieved the users views
Route::get('/admin/users', [UserController::class, 'get_users'])->name('admin.users');

//adding user
Route::post('/adduser', [UserController::class, 'store_staff']);

//deleting a user
Route::get('/users/{user_id}/delete', [UserController::class, 'destroy'])->name('users.delete');

//update user
Route::get('/users/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update{id}', [UserController::class, 'update'])->name('users.update');

//return the users views get the services from dropdown
Route::get('/admin/services', [ServicesController::class, 'get_services'])->name('admin.services');

//adding service
Route::post('/addservice', [ServicesController::class, 'store'])->name('services.store');
//delete service
Route::get('/service/{service_id}/delete', [ServicesController::class, 'destroy'])->name('services.delete');

Route::get('/services/{service_id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
Route::post('/services/update{id}', [ServicesController::class, 'update'])->name('services.update');


Route::post('/addcategory', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/category', [CategoryController::class, 'get_categories'])->name('admin.category');
Route::get('/category/{category_id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');


Route::get('/category/{category_id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');



Route::post('/addproduct', [InventoryController::class, 'store'])->name('product.store');
Route::get('/admin/inventory', [InventoryController::class, 'get_products'])->name('admin.inventory');
Route::get('/inventory/{product_id}/delete', [InventoryController::class, 'destroy'])->name('product.delete');

Route::get('/inventory/{product_id}/edit', [InventoryController::class, 'edit'])->name('product.edit');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])->name('product.update');


Route::post('/addinquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/admin/inquiries', [InquiryController::class, 'get_inquiries'])->name('admin.inquiries');

Route::get('/inquiry/{inquiry_id}/delete', [InquiryController::class, 'destroy'])->name('inquiry.delete');


Route::get('/inquiry/{inquiry_id}/edit', [InquiryController::class, 'edit'])->name('inquiry.edit');
Route::post('/inquiry/update{id}', [InquiryController::class, 'update'])->name('inquiry.update');

Route::get('/inquiry/{inquiry_id}', [InquiryController::class, 'viewMessage'])->name('admin_side/view_message');
// Route::post('/update-status/{inquiry_id}', [InquiryController::class, 'updateStatus'])->name('update_status');
Route::post('/reply/{inquiry_id}', [InquiryController::class, 'messageReply'])->name('send_reply');



Route::get('/appointment', [AppointmentController::class, 'showAppointmentForm']);
Route::post('/appointment', [AppointmentController::class, 'store_appointment'])->name('appointment.store');

Route::get('/admin', [AppointmentController::class, 'get_appointments'])->name('client_side.list_appointments');

//return the users views
Route::get('/list_appointments', [AppointmentController::class, 'get_appointments']);


Route::get('/admin/generate-report', [ReportGenerationController::class, 'generateReport'])->name('admin.generate_report');
Route::post('/generate-report', [ReportGenerationController::class, 'generateReport'])->name('generate_report');

Route::get('/client/appointments', [AppointmentController::class, 'getClientAppointments'])
    ->name('client.appointments');


Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
Route::get('/', [ContentManagementController::class, 'getHomepage']);
Route::get('/homepage', [ContentManagementController::class, 'getHomepage']);


Route::get('/footer', [ContentManagementController::class, 'get_footer'])->name('admin_side.content_management.footer_list');
Route::post('/addfooter', [ContentManagementController::class, 'store'])->name('footer.store');


Route::get('/footer/{footer_id}/edit', [ContentManagementController::class, 'edit'])->name('footer.edit');
Route::post('/footer/update{id}', [ContentManagementController::class, 'update'])->name('footer.update');


Route::get('/service_list', [ContentManagementController::class, 'get_service_list'])->name('admin_side.content_management.services_list');
Route::post('/addservice_list', [ContentManagementController::class, 'store_service_list'])->name('service_list.store');
Route::get('/service_list/{services_id}/delete', [ContentManagementController::class, 'destroy'])->name('service_info.delete');

Route::get('/service_list/{services_id}/edit', [ContentManagementController::class, 'edit_service_list'])->name('footer.edit');
Route::post('service_list/update{id}', [ContentManagementController::class, 'update_service_list'])->name('service_info.update');

Route::get('/admin/cases', [SpecialCasesController::class, 'get_services'])->name('admin.cases');
Route::post('/add-special-cases', [SpecialCasesController::class, 'store'])->name('cases.store');
Route::get('/admin/special-cases', [SpecialCasesController::class, 'get_special_cases'])->name('admin_side.cases');

Route::get('/case/{special_case_id}/delete', [SpecialCasesController::class, 'destroy'])->name('case.delete');


Route::get('/case/{special_case_id}/edit', [SpecialCasesController::class, 'edit'])->name('special_case.edit');
Route::post('/case/update{id}', [SpecialCasesController::class, 'update'])->name('case.update');

