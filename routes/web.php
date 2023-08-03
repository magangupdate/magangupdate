<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\MUAController;
use App\Http\Controllers\MUAPController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AssessmentMenteeApplicationController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MUController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/storage_link', function (){ Artisan::call('storage:link'); });

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/jobs', [LandingController::class, 'jobs'])->name('jobs');
Route::get('/jobs/detail', [LandingController::class, 'jobDetail']);
Route::get('/articles', [LandingController::class, 'articles'])->name('articles');
Route::get('/magang-update-acceleration-program', [LandingController::class, 'muap'])->name('muap');
Route::get('/cv-clinic', [LandingController::class, 'cvClinic'])->name('cv-clinic');

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/articles/{slug}', [ArticleController::class, 'detailBlog']);

/*
|--------------------------------------------------------------------------
| Jobs
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/jobs/asean-foundation-onsite-internship', [JobController::class, 'firstJob']);
Route::get('/jobs/wings-internship', [JobController::class, 'secondJob']);
Route::get('/jobs/malam-minggu-markeing-communication-and-graphic-designer-intern', [JobController::class, 'thirdJob']);
Route::get('/jobs/mitrasasana-architect-intern', [JobController::class, 'fourthJob']);
Route::get('/jobs/goers-internship-program', [JobController::class, 'fifthJob']);

/*
|--------------------------------------------------------------------------
| MUA Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your MUA website. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/MUAVol9', [MUAController::class, 'index'])->name('mua');
Route::get('/RegistMUAVol9', [MUAController::class, 'regist'])->name('mua.regist');

/*
|--------------------------------------------------------------------------
| MUAP Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your MUAP website. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/MUAP16', [MUAPController::class, 'index'])->name('muap');
Route::get('/RegistMUAP16', [MUAPController::class, 'regist'])->name('muap.regist');

Route::get('/dashboard/login', [MUController::class, 'login'])->name('dashboard.mu.login')->middleware('guest');
Route::post('/dashboard/login', [MUController::class, 'auth'])->name('dashboard.mu.auth')->middleware('guest');
Route::get('/dashboard/logout', [MUController::class, 'logout'])->name('dashboard.mu.logout');

Route::get('/dashboard', [MUController::class, 'dashboard'])->name('dashboard.mu.index');

Route::get('/dashboard/articles', [MUController::class, 'articles'])->name('dashboard.mu.articles');
Route::get('/dashboard/articles/create', [
    ArticleController::class,
    'create',
])->name('dashboard.mu.articles.create');
Route::post('/dashboard/articles', [ArticleController::class, 'store'])->name('dashboard.mu.articles.store');
Route::put('/dashboard/articles', [ArticleController::class, 'update'])->name('dashboard.mu.articles.update');
Route::delete('/dashboard/articles', [ArticleController::class, 'destroy'])->name('dashboard.mu.articles.destroy');
Route::get('/dashboard/articles/{slug}', [ArticleController::class, 'show'])->name('dashboard.mu.articles.detail');

Route::get('/dashboard/jobs', [MUController::class, 'jobs'])->name('dashboard.mu.jobs');
Route::post('/dashboard/jobs', [JobController::class, 'store'])->name('dashboard.mu.jobs.store');
Route::put('/dashboard/jobs', [JobController::class, 'update'])->name('dashboard.mu.jobs.update');
Route::delete('/dashboard/jobs', [JobController::class, 'destroy'])->name('dashboard.mu.jobs.destroy');
Route::get('/dashboard/jobs/{id}/{slug}', [JobController::class, 'show'])->name('dashboard.mu.jobs.detail');

Route::post('/dashboard/upload-image', [
    MUController::class,
    'uploadImage',
])->name('dashboard.mu.upload-image');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/MUAVol9/dashboard', [MUAController::class, 'dashboard'])->name('dashboard.mua.index');

    Route::get('/MUAVol9/dashboard/mentees', [MUAController::class, 'mentees'])->name('dashboard.mua.mentees');
    Route::get('/MUAVol9/dashboard/mentees/{menteeID}', [MUAController::class, 'mentee']);

    Route::get('/MUAVol9/dashboard/mentors', [MUAController::class, 'mentors'])->name('dashboard.mua.mentors');
    Route::post('/MUAVol9/dashboard/mentors', [MentorController::class, 'store'])->name('dashboard.mua.mentors.store');
    Route::delete('/MUAVol9/dashboard/mentors', [MentorController::class, 'destroy'])->name('dashboard.mua.mentors.destroy');
    Route::put('/MUAVol9/dashboard/mentors', [MentorController::class, 'update'])->name('dashboard.mua.mentors.update');
    
    Route::post('/MUAVol9/dashboard/assessment', [AssessmentMenteeApplicationController::class, 'store'])->name('dashboard.mua.assessment.store');
    Route::put('/MUAVol9/dashboard/assessment', [AssessmentMenteeApplicationController::class, 'update'])->name('dashboard.mua.assessment.update');
    
    Route::get('/MUAVol9/dashboard/classes', [MUAController::class, 'classes'])->name('dashboard.mua.classes');
    Route::post('/MUAVol9/dashboard/classes', [ClassesController::class, 'store'])->name('dashboard.mua.classes.store');
    Route::delete('/MUAVol9/dashboard/classes', [ClassesController::class, 'destroy'])->name('dashboard.mua.classes.destroy');
    Route::put('/MUAVol9/dashboard/classes', [ClassesController::class, 'update'])->name('dashboard.mua.classes.update');
    
    Route::get('/MUAVol9/dashboard/mentees/class/{id}/{slug}', [MUAController::class, 'class'])->name('dashboard.mua.classes.detail');
    
    Route::get('/MUAVol9/dashboard/logout', [LoginController::class, 'logout_dashboard_mua'])->name('dashboard.mua.logout');

    Route::get('/MUAVol9/dashboard/accounts', [MUAController::class, 'accounts'])->name('dashboard.mua.accounts'); 
    Route::post('/MUAVol9/dashboard/accounts', [UserController::class, 'store'])->name('dashboard.mua.accounts.store');
    Route::put('/MUAVol9/dashboard/accounts', [UserController::class, 'update'])->name('dashboard.mua.accounts.update');
    Route::delete('/MUAVol9/dashboard/accounts', [UserController::class, 'destroy'])->name('dashboard.mua.accounts.destroy');
    
    Route::get('/MUAVol9/dashboard/mentees/export/{id}/{classID}', [MenteeController::class, 'export']);
});

// Route::post('/RegistMUAVol9/mentees', [MenteeController::class, 'store'])->name('mua.mentees.store')->middleware('guest');
// Route::get('/RegistMUAVol9/success', [MUAController::class, 'success'])->name('mua.mentees.success')->middleware('guest');
Route::get('/RegistMUAVol9/error', [MUAController::class, 'error'])->name('mua.mentees.error')->middleware('guest');

Route::get('/MUAVol9/dashboard/login', [LoginController::class, 'login_dashboard_mua'])->name('dashboard.mua.login')->middleware('guest');
Route::post('/MUAVol9/dashboard/login', [LoginController::class, 'auth_dashboard_mua'])->name('dashboard.mua.auth')->middleware('guest');
