<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveFormController;
use App\Models\ReserveForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use App\Http\Controllers\OwnerProfileController;
use App\Http\Controllers\ReserveListController;
use App\Models\Owner;

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

// Route::resource('forms', ReserveFormController::class);
// Route::get('forms', [ReserveFormController::class, 'index'])->name('forms.index');

// Route::prefix('forms') // 頭に forms をつける
//  ->middleware(['auth']) // 認証
//  ->name('forms.') // ルート名
//  ->controller(ReserveFormController::class) // コントローラ指定(laravel9から)
//  ->group(function(){ // グループ化
//  Route::get('/', 'index')->name('index'); // 名前つきルート
//  Route::get('/create', 'create')->name('create'); 
//  Route::post('/', 'store')->name('store');
//  Route::get('/{id}', 'show')->name('show');
//  Route::get('/{id}/edit', 'edit')->name('edit');
//  Route::post('/{id}', 'update')->name('update');
//  Route::post('/{id}/destroy', 'destroy')->name('destroy');

// });


// Route::get('/', function () {
//     return view('owner.welcome');
// });


Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners'])->name('dashboard');

Route::prefix('blog')
    ->middleware('auth:owners')
    ->name('blog.')
    ->controller(BlogController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

Route::prefix('reserve-list')
    ->middleware('auth:owners')
    ->name('reserve-list.')
    ->controller(ReserveListController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/past', 'past')->name('past');
        Route::get('cancel', 'cancel')->name('cancel');
        Route::get('/{id}', 'show')->name('show');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

Route::prefix('cast-list')
    ->middleware('auth:owners')
    ->name('cast-list.')
    ->controller(CastController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
    });



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:owners')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


Route::middleware('auth:owners')->group(function () {
    Route::get('/profile', [OwnerProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [OwnerProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [OwnerProfileController::class, 'destroy'])->name('profile.destroy');
});
