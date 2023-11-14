<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Admin;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Employer;
use App\Models\Seeker;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->id();
        $admin = User::where('id', $id)->first();
        // $admin = Admin::with('user')->where("user_id", $id)->first();
        $users = User::take(5)->get();
        $jobs = Job::take(5)->get();
        $applications = Application::with('seeker.user', 'job')->take(5)->get();
        $seekers = Seeker::with('user')->take(5)->get();
        $employers = Employer::with('user')->take(5)->get();

        return Inertia::render(
            'Admin/ADashboard',
            [
                "admin" => $admin, 'users' => $users,
                'jobs' => $jobs, 'applications' => $applications,
                'seekers' => $seekers, 'employers' => $employers,
            ]
        );
    }


    public function deactivateUser(Request $request, $user_id)
    {

        $validated_data = $request->validate(['status' => 'sometimes|bool']);
        $user = User::where('id', $user_id)->first();
        $user->is_active = $validated_data['status'];
        $user->save();
        return Inertia::render('Admin/OneUser', ['user' => $user]);

    }


    public function allUsers()
    {
        $users = User::all();
        return Inertia::render('Admin/AllUsers', ['users' => $users]);
    }


    public function oneUser($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return Inertia::render('Admin/User', ['user' => $user]);
    }



    public function allSeekers()
    {
        $seekers = Seeker::with('user')->get();
        return Inertia::render('Admin/AllSeekers', ['seekers' => $seekers]);
    }


    public function oneSeeker($user_id)
    {
        $seeker = Seeker::with('user')->where('id', $user_id)->first();
        return Inertia::render('Admin/OneSeeker', ['seeker' => $seeker]);

    }


    public function allEmployers()
    {
        $employers = Employer::with('user')->get();
        return Inertia::render('Admin/AllEmployers', ['employers' => $employers]);

    }


    public function oneEmployer($user_id)
    {
        $employer = Employer::with('user')->where('id', $user_id)->first();
        return Inertia::render('Admin/OneEmployer', ['employer' => $employer]);


    }

    public function allJobs()
    {

        $jobs = Job::with('employer.user')->get();
        return Inertia::render('Admin/AllJobs', ['jobs' => $jobs]);

    }


    public function oneJob($job_id)
    {

        $job = Job::where('id', $job_id)->first();
        return Inertia::render('Admin/OneJob', ['job' => $job]);

    }

    public function allApplications()
    {
        $applications = Application::with(
            'seeker',
            'seeker.user',
            'seeker.experiences',
            'seeker.qualifications',
            'job'
        )->get();
        return Inertia::render('Admin/AllApplications', ['applications' => $applications]);

    }

    public function oneApplication($application_id)
    {
        $application = Application::with(
            'seeker',
            'seeker.user',
            'seeker.qualifications',
            'seeker.experiences',
            'job'
        )->where('id', $application_id)->first();
        return Inertia::render('Admin/Application', ['application' => $application]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
