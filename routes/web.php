<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemLoansController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomLoansController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('index');

// Route::resource('itemlist', ItemLoansController::class)->only(['edit']);
Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('auth', [LoginController::class, 'login'])->name('auth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('searchroom', [LandingPageController::class, 'searchRoom'])->name('searchroom');

Route::middleware(['auth'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [LandingPageController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('rooms', App\Http\Controllers\RoomController::class);
        Route::resource('items', App\Http\Controllers\ItemController::class);
        Route::get('roomloans', [RoomLoansController::class, 'index'])->name('roomloans.index');
        Route::get('itemloans', [ItemLoansController::class, 'index'])->name('itemloans.index');
        Route::get('roomloan-list', [RoomLoansController::class, 'indexReturnRoom'])->name('loanroom.return');
        Route::get('itemloan-list', [ItemLoansController::class, 'indexReturnItem'])->name('loanitem.return');
        Route::put('itemloan/{itemLoan}/action', [ItemLoansController::class, 'acceptOrReject'])->name('itemloan.action');
        Route::put('roomloan/{roomLoan}/action', [RoomLoansController::class, 'acceptOrReject'])->name('roomloan.action');
        Route::put('itemloan/{itemLoan}/return', [ItemLoansController::class, 'returnTheItem'])->name('itemloan.return');
        Route::put('roomloan/{roomLoan}/return', [RoomLoansController::class, 'returnTheRoom'])->name('roomloan.return');
        Route::get('history/item-loan', [HistoryController::class, 'indexItem'])->name('itemloan.history');
        Route::get('history/room-loan', [HistoryController::class, 'indexRoom'])->name('roomloan.history');
    });

    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('room-list', [RoomController::class, 'availableRooms'])->name('rooms.available');
        Route::get('item-list', [ItemController::class, 'availableItems'])->name('items.available');
        Route::get('itemlist/{itemlist}/request', [ItemLoansController::class, 'edit'])->name('itemlist.edit');
        Route::get('roomlist/{roomLoan}/request', [RoomLoansController::class, 'edit'])->name('roomlist.edit');
        Route::post('itemlist/request', [ItemLoansController::class, 'requestItemLoans'])->name('itemlist.request');
        Route::post('roomlist/request', [RoomLoansController::class, 'requestRoomLoans'])->name('roomlist.request');
    });
});
