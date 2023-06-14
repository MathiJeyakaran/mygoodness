<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

/*
|------------------------------------f--------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[HomeController::class, 'index']);
Route::get('/loginCheck',[HomeController::class, 'loginCheck']);
Route::post('/verification',[HomeController::class, 'verification']);
// Route::post('/verify',[HomeController::class, 'verify']);
// Route::post('/otplogin',[HomeController::class, 'login']);
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);
    $limiter = config('fortify.limiters.login');
    Route::post('/verify', [HomeController::class, 'verify'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));
    });
Route::any('/notification', [AccountController::class, 'notification'])->name('notification');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms_of_service', [HomeController::class, 'terms_of_service'])->name('terms_of_service');
Route::get('/blogview', [HomeController::class, 'blogview'])->name('blogview');
Route::get('/redirect',[HomeController::class, 'redirect']);
Route::get('/donation-counter', [DonationController::class, 'showDonationCounter'])->name('donation-counter');

Route::get('/donation-start', [DonationController::class, 'start'])->name('donation.start');

// Route::get('/form',[HomeController::class, 'form']);
// Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
// Route::get('/success', [PaymentController::class, 'success'])->name('success');
// Route::get('/error', [PaymentController::class, 'error'])->name('error');

Route::group(['middleware' => ['disable_back']], function () {
    Route::group(['middleware' => ['islogin']], function () {
        Route::group(['middleware' => ['users']], function () {
            // Route::get('/redirect',[HomeController::class, 'redirect']);

            Route::get('/create',[DonationController::class, 'index']);
            Route::get('/invites', [DonationController::class, 'invited']);
            Route::post('/getsearch ',[DonationController::class, 'getsearch']);
            Route::post('/orgdata ',[DonationController::class, 'orgdata']);
            Route::post('/donate',[DonationController::class, 'donate']);
            Route::get('/thankyou ',[DonationController::class, 'thankyou']);

            Route::get('/share',[FriendController::class, 'index'])->name('share');
            Route::post('/invite',[FriendController::class, 'invite']);
            Route::get('/growing',[FriendController::class, 'growing']);
            Route::post('/getuser',[FriendController::class, 'getuser']);

            Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
            Route::get('/success', [PaymentController::class, 'success'])->name('success');
            Route::get('/error', [PaymentController::class, 'error'])->name('error');
            Route::any('/notify', [PaymentController::class, 'notify'])->name('notify');

            Route::get('/my_account',[AccountController::class, 'index'])->name('account');
            Route::post('/updateUser',[AccountController::class, 'updateUser']);
            Route::post('/updateNotify',[AccountController::class, 'updateNotify']);
            Route::post('/removeAccount',[AccountController::class, 'removeAccount']);
            Route::post('/continue', [DonationController::class, 'continue']);
        });
    });

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin',[AdminController::class, 'index']);
        Route::get('/deleteAccount/{phone}', [AdminController::class, 'deleteAccount']);
        Route::get('/editAbout', [AdminController::class, 'editAbout']);
        Route::post('/updateAbout', [AdminController::class, 'updateAbout']);
        Route::get('/getBlogs', [AdminController::class, 'getBlogs']);
        Route::get('/deleteBlog/{id}', [AdminController::class, 'deleteBlog']);
        Route::post('/addBlog', [AdminController::class, 'addBlog']);
        Route::post('/updateBlog', [AdminController::class, 'updateBlog']);
        Route::get('/profile', [AdminController::class, 'profile']);
        Route::post('/UploadFiles', [AdminController::class, 'UploadFiles']);

    });
});
