<?php

use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Company\CompanyRegisterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\Company;
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

// 一番最初に表示される画面は案件一覧
Route::get('/', [JobController::class, 'index'])
    ->name('root');

Route::get('/dashboard', function () {
    return view('jobs.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'companies'], function () {
    // 登録
    Route::get('register', [CompanyRegisterController::class, 'create'])
        ->name('companies.register');

    Route::post('register', [CompanyRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [CompanyLoginController::class, 'showLoginPage'])
        ->name('companies.login');

    Route::post('login', [CompanyLoginController::class, 'login']);

    // ログインしてないと見せたくないページやエンドポイントなどは、以下のミドルウェア内に記述
    Route::middleware(['auth:company'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn () => view('companies.dashboard'))
            ->name('companies.dashboard');

        Route::get('logout', [CompanyLoginController::class, 'logout'])->name('companies.logout');
    });
});

Route::resource('jobs', JobController::class)
    ->only(['show', 'index']);

Route::middleware(['auth:company'])->group(function () {
    Route::resource('jobs', JobController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';
