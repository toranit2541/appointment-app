<?php

// use App\Http\Controllers\AppointmentController;
// use App\Http\Controllers\AdminController;

// // Appointments routes
// Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
// Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
// Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
// Route::get('/appointments/calendar', [AppointmentController::class, 'calendar'])->name('appointments.calendar');
// Route::get('/appointments/events', [AppointmentController::class, 'events'])->name('appointments.events');

// Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
// Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
// Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
// Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
// Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
// Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');

// // Appointment-related routes under AdminController
// Route::get('/admins/appointments', [AdminController::class, 'appointments'])->name('admins.appointments');
// Route::get('/admins/appointments/{appointment}', [AdminController::class, 'showAppointment'])->name('admins.appointment.show');
// Route::get('/admins/appointments/{appointment}/edit', [AdminController::class, 'editAppointment'])->name('admins.appointment.edit');
// Route::put('/admins/appointments/{appointment}', [AdminController::class, 'updateAppointment'])->name('admins.appointment.update');
// Route::delete('/admins/appointments/{appointment}', [AdminController::class, 'destroyAppointment'])->name('admins.appointment.destroy');
// Route::get('/admins/appointments/export', [AdminController::class, 'exportAppointments'])->name('admins.appointments.export');

// Route::prefix('admins/appointments')->group(function () {
//     Route::get('/', [AdminController::class, 'appointments'])->name('admins.appointments');
//     Route::get('/export', [AdminController::class, 'exportAppointments'])->name('admins.appointments.export');
//     Route::get('/{appointment}', [AdminController::class, 'showAppointment'])->name('admins.appointment.show');
//     Route::get('/{appointment}/edit', [AdminController::class, 'editAppointment'])->name('admins.appointment.edit');
//     Route::put('/{appointment}', [AdminController::class, 'updateAppointment'])->name('admins.appointment.update');
//     Route::delete('/{appointment}', [AdminController::class, 'destroyAppointment'])->name('admins.appointment.destroy');
// }); 

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;

// Appointments routes
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
    Route::get('/create', [AppointmentController::class, 'create'])->name('create');
    Route::post('/', [AppointmentController::class, 'store'])->name('store');
    Route::get('/calendar', [AppointmentController::class, 'calendar'])->name('calendar');
    Route::get('/events', [AppointmentController::class, 'events'])->name('events');
    // ✅ New route for handling booking creation with a selected date
    Route::get('/createbooking', [AppointmentController::class, 'createBooking'])->name('createbooking');
});

// Admin routes
Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');

    // Appointments Management under Admin
    // Route::prefix('appointments')->name('appointments.')->group(function () {
    //     Route::get('/', [AppointmentController::class, 'appointments'])->name('index');
    //     Route::get('/create', [AppointmentController::class, 'create'])->name('create');
    //     Route::post('/', [AppointmentController::class, 'store'])->name('store');
    //     Route::get('/calendar', [AppointmentController::class, 'calendar'])->name('calendar');
    //     Route::get('/events', [AppointmentController::class, 'events'])->name('events');
    // });
    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/', [AdminController::class, 'appointments'])->name('index');
        Route::get('/export', [AdminController::class, 'exportAppointments'])->name('export');
        Route::get('/{appointment}', [AdminController::class, 'showAppointment'])->name('show');
        Route::get('/{appointment}/edit', [AdminController::class, 'editAppointment'])->name('edit');
        Route::put('/{appointment}', [AdminController::class, 'updateAppointment'])->name('update');
        Route::delete('/{appointment}', [AdminController::class, 'destroyAppointment'])->name('destroy');
    });
});