<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('cms/')->middleware('guest:admin,manager,employee,user')->group(function () {

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('cms.login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('cms.register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::prefix('cms/admin')->middleware(['auth:admin,manager'])->group(function () {
    Route::view('/', 'cms.dashboard')->name('cms.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('managers', ManagerController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('products', ProductController::class);

    // Route::resource('cities', CityController::class);
    // Route::get('edit-password', [AuthController::class, 'editPassword'])->name('password.edit');
    // Route::put('update-password', [AuthController::class, 'updatePassword'])->name('password.update');
});
Route::get('logout', [AuthController::class, 'logout'])->name('cms.logout');
// routes/web.php

Route::get('/api/subcategories/{category}', function (App\Models\Category $category) {
    $subcategories = $category->subcategories;

    return response()->json($subcategories);
});
