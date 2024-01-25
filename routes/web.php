<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Models\Job;

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

Route::get(
    '/',
    function () {
        return Inertia::render(
            'Welcome',
            [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'jobs' => Job::take(10)->get()
            ]
        );
    }
);



Route::get('/jobs', [JobController::class, 'getAllJobs'])->name('jobs.all');
Route::post('/jobs', [JobController::class, 'searchJobs'])->name('jobs.search');
Route::get('/jobs/{job_id}', [JobController::class, 'getJob'])->name('jobs.one');




// Admin Routes
Route::middleware(['auth', 'is_admin:"true"'])->group(
    function () {
        Route::name('admin.')->prefix('admin')->group(
            function () {
                Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


                Route::get('/users', [AdminController::class, 'allUsers'])->name('users.all');
                Route::get('/users/{user_id}', [AdminController::class, 'oneUser'])->name('users.one');
                Route::put('/users/{user_id}', [AdminController::class, 'deactivateUser'])->name('users.deactivate');
                Route::get('/seekers', [AdminController::class, 'allSeekers'])->name('seekers.all');
                Route::get('/seekers/{user_id}', [AdminController::class, 'oneSeeker'])->name('seekers.one');
                Route::get('/employers', [AdminController::class, 'allEmployers'])->name('employers.all');
                Route::get('/employers/{user_id}', [AdminController::class, 'oneEmployer'])->name('employers.one');
                Route::get('/jobs', [AdminController::class, 'alljobs'])->name('jobs.all');
                Route::get('/jobs/{job_id}', [AdminController::class, 'oneJob'])->name('jobs.one');
                Route::get('/applications', [AdminController::class, 'allApplications'])->name('applications.all');
                Route::get('/applications/{application_id}', [AdminController::class, 'allApplications'])->name('applications.one');
            }
        );
    }
);





// Employer Routes
Route::middleware(['auth', 'account_type:employer'])->group(
    function () {
        Route::get('/employerprofile', [EmployerController::class, 'show'])->name('employer.profile');
        Route::name('employer.')->prefix('employer')->group(
            function () {
                Route::get('/dashboard', [EmployerController::class, 'index'])->name('dashboard');
                Route::patch('/profile', [EmployerController::class, 'update'])->name('update');

                Route::get('/jobs/create', [JobController::class, 'employerShowCreateJob'])->name('jobs.show');
                Route::patch('/jobs/update/{job_id}', [JobController::class, 'employerUpdateJob'])->name('jobs.update');
                Route::get('/jobs', [JobController::class, 'employerShowAll'])->name('jobs.all');
                Route::get('/jobs/{job_id}', [JobController::class, 'employerShowOne'])->name('jobs.one');
                Route::post('/jobs', [JobController::class, 'employerCreateJob'])->name('jobs.create');

                Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.all');
                Route::get('/applications/{job_id}', [ApplicationController::class, 'employerShowAll'])->name('applications.jobs.all');
                Route::get('/applicant/{application_id}', [ApplicationController::class, 'employerShowOne'])->name('applications.jobs.one');
                Route::patch('/applicant/{application_id}', [ApplicationController::class, 'employerUpdateOne'])->name('applications.jobs.updateOne');
            }
        );
    }
);



// Seeker Routes
Route::middleware(['auth', 'account_type:seeker'])->group(
    function () {
        Route::get('/profile', [SeekerController::class, 'show'])->name('seeker.profile');
        Route::name('seeker.')->prefix('seeker')->group(
            function () {
                Route::get('/dashboard', [SeekerController::class, 'index'])->name('dashboard');
                Route::put('/profile', [SeekerController::class, 'update'])->name('update');

                Route::get('/jobs', [JobController::class, 'seekerShowAll'])->name('jobs.all');
                Route::get('/jobs/{job_id}', [JobController::class, 'seekerShowOne'])->name('jobs.one');
                Route::post('/jobs', [JobController::class, 'seekerSearchJobs'])->name('jobs.search');

                Route::get('/applications', [ApplicationController::class, 'seekerShowAll'])->name('applications.all');
                Route::get('/applications/{application_id}', [ApplicationController::class, 'seekerShowOne'])->name('applications.one');
                Route::middleware('throttle:2:1');
                Route::post('/apply', [ApplicationController::class, 'seekerApply'])->name('apply');
            }
        );
    }
);

// Route::fallback();

// Route::middleware('auth')->group(function () {});

require __DIR__ . '/auth.php';
