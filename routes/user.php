<?php
/**
 * Created by PhpStorm.
 * User: 585
 * Date: 4/3/2024
 * Time: 4:32 PM
 */

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\User as UserMiddleware;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\NoteController as UserNoteController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\User\MessageController as UserMessageController;


Route::middleware(UserMiddleware::class)->group(function (){
    Route::get('/user', [ UserDashboardController::class, 'index' ])->name('user.dashboard');

    Route::get('/user/notes', [ UserNoteController::class, 'index' ])->name('user.notes');
    Route::get('/user/notes/add', [ UserNoteController::class, 'add_get' ])->name('user.notes.add.get');
    Route::post('/user/notes/add', [ UserNoteController::class, 'add_post' ])->name('user.notes.add.post');
    Route::get('/user/notes/view/{id}', [ UserNoteController::class, 'view' ])->name('user.notes.view');
    Route::get('/user/notes/edit/{id}', [ UserNoteController::class, 'edit_get' ])->name('user.notes.edit.get');
    Route::post('/user/notes/edit', [ UserNoteController::class, 'edit_post' ])->name('user.notes.edit.post');
    Route::get('/user/notes/pin/{id}', [ UserNoteController::class, 'pin' ])->name('user.notes.pin');
    Route::get('/user/notes/unpin/{id}', [ UserNoteController::class, 'unpin' ])->name('user.notes.unpin');
    Route::get('/user/notes/delete/{id}', [ UserNoteController::class, 'delete' ])->name('user.notes.delete');
    Route::get('/user/notes/restore/{id}', [ UserNoteController::class, 'restore' ])->name('user.notes.restore');

    Route::get('/user/notes/deleted-list', [ UserNoteController::class, 'deleted_list' ])->name('user.notes.deleted');



});