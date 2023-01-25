<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});

Route::group(['middleware' => 'auth'], function() {

Route::get('/home', [DisplayController::class, 'index'])->name('index');
Route::post('search', [DisplayController::class, 'fillter']);

Route::get('/parking/detail/{parking}',[DisplayController::class, 'parkingDetail'])->name('parking.detail');

Route::get('/new_parking', function () { return view('parking_form'); })->name('create.parking');
Route::post('/new_parking', [RegistrationController::class, 'createParking']);

Route::get('/owner_chat/{parking}',[ChatController::class, 'owner_index'])->name('owner.index');

Route::get('/chat/{chat}',[ChatController::class, 'index'])->name('chat');
Route::post('/add/{chat}',[ChatController::class, 'add'])->name('add');
Route::get('/result/ajax', [ChatController::class, 'getData']);

Route::get('/edit/{parking}', [RegistrationController::class, 'editForm'])->name('edit.parking');
Route::post('/edit/{parking}', [RegistrationController::class, 'editParking']);

Route::get('/start/{parking}', [RegistrationController::class, 'startForm'])->name('start.parking');
Route::post('/start/{parking}', [RegistrationController::class, 'startParking']);
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('login',     'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\Auth\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('/home','Admin\DisplayController@index')->name('admin.index');
    Route::post('admin_search', 'Admin\DisplayController@fillter');
    Route::get('user/detail/{user_id}', 'Admin\DisplayController@userDetail')->name('user.detail');
    Route::get('/parking/detail/{id}','Admin\DisplayController@parkingDetail')->name('admin.parking.detail');
});