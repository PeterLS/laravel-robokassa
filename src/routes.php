<?php

namespace PeterLS\LaravelRobokassa\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('payment')->name('robokassa.payment.')->group(function () {
    Route::match(['get', 'post'], 'result', PaymentResultController::class)->name('result');
    Route::match(['get', 'post'], 'success', PaymentSuccessController::class)->name('success');
    Route::match(['get', 'post'], 'fail', PaymentFailController::class)->name('fail');
});