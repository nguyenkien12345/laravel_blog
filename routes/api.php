<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneSignalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('onesignal')->group(function () {
    Route::get('notifications', [OneSignalController::class, 'getAllNotification'])->name('onesignal.notifications');
    Route::get('notifications/{notificationId}', [OneSignalController::class, 'getSingleNotification'])->name('onesignal.notifications.detail');
    Route::get('devices', [OneSignalController::class, 'getAllDevice'])->name('onesignal.devices');
    Route::get('devices/{deviceId}', [OneSignalController::class, 'getSingleDevice'])->name('onesignal.devices.detail');
    Route::get('apps', [OneSignalController::class, 'getAllApp'])->name('onesignal.apps');
    Route::get('apps/{appId}', [OneSignalController::class, 'getSingleApp'])->name('onesignal.apps.detail');

    Route::post('create-app', [OneSignalController::class, 'createApp'])->name('onesignal.create-app');
    Route::get('delete-device/{deviceId}', [OneSignalController::class, 'deleteDevice'])->name('onesignal.delete-device');

    Route::post('send-notification', [OneSignalController::class, 'sendNotification'])->name('onesignal.send-notification');
    Route::post('cancel-notification/{notificationId}', [OneSignalController::class, 'cancelNotification'])->name('onesignal.cancel-notification');

    Route::post('add-device-internal', [OneSignalController::class, 'addDevice'])->name('onesignal.add-device-internal');
});
