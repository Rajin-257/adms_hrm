<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AbsensiSholatController;
use App\Http\Controllers\iclockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BranchController;

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

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes
Route::middleware(['auth', 'check.activity'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // Device setup routes for branch users
    Route::get('/device/setup', [HomeController::class, 'showDeviceSetup'])->name('device.setup');
    Route::post('/device/setup', [HomeController::class, 'setupDevice'])->name('device.setup.store');
    
    // Device routes
    Route::get('devices', [DeviceController::class, 'Index'])->name('devices.index');
    Route::get('devices-log', [DeviceController::class, 'DeviceLog'])->name('devices.DeviceLog');
    Route::get('finger-log', [DeviceController::class, 'FingerLog'])->name('devices.FingerLog');
    Route::get('attendance', [DeviceController::class, 'Attendance'])->name('devices.Attendance');
    
    // Branch management (only for superadmin)
    Route::middleware('can:manage-branches')->group(function () {
        Route::resource('branches', BranchController::class);
    });
});

// ZKTeco device communication routes (no auth required)
Route::get('/iclock/cdata', [iclockController::class, 'handshake']);
Route::post('/iclock/cdata', [iclockController::class, 'receiveRecords']);
Route::get('/iclock/test', [iclockController::class, 'test']);
Route::get('/iclock/getrequest', [iclockController::class, 'getrequest']);
