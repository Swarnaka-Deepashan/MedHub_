<?php

use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PrescriptionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//prescriptions

// Show the prescription upload form
Route::get('/upload-prescription', [PrescriptionController::class, 'create'])->name('prescriptions');

// Handle the prescription form submission
Route::post('/upload-prescription', [PrescriptionController::class, 'store'])->name('prescriptions.store');

//p
Route::get('/prescriptions/index', [PrescriptionController::class, 'index'])->name("prescriptionsIndex");
Route::get('/prescriptions/show/{id}', [PrescriptionController::class, 'show'])->name('prescriptionsShow');







Route::post('/quotation', [QuotationController::class, 'store']);


Route::get('/quotations/index', [QuotationController::class, 'index'])->name("quotationsIndex");




//accept or reject


Route::post('/quotations/accept', [QuotationController::class, 'acceptAll'])->name('quotations.accept');
Route::post('/quotations/reject', [QuotationController::class, 'rejectAll'])->name('quotations.reject');





//feedbackview
Route::get('/feedback', function(){
    return view('actionlogsIndex');
})->name('actionlogs.index');

Route::get('/feedback', [ActionController::class, 'index'])->name('actionlogs.index');

