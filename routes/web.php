<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveFormController;
use App\Models\ReserveForm;
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

Route::prefix('booking') // 頭に forms をつける
    ->middleware(['auth']) // 認証
    ->name('booking.') // ルート名
    ->controller(BookingController::class) // コントローラ指定(laravel9から)
    ->group(function () { // グループ化
        Route::get('/', 'index')->name('index'); // 名前つきルート
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        Route::get('/past', 'past')->name('past');
    });

Route::get('/reservations/events', function () {
    $events = ReserveForm::select('id', 'name as title', 'start_date as start', 'end_date as end', 'cast_category_id as cast')->get();

    return response()->json($events);
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/', [NewsController::class, 'home'])->name('home');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:users'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
