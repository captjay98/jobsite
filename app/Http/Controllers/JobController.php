<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Show all Jobs for Employer
     */

    public function allJobs()
    {
        $jobs = Job::get();
        return (["jobs" => $jobs]);
    }

    public function employerShowAll()
    {
        $id = auth()->id();
        $employer = Employer::with('user')
                            ->where('user_id', $id)
                            ->first();
        $jobs = $employer->jobs;

        return Inertia::render('Employer/EJobs', ['jobs' => $jobs]);
        //
    }

    /**
        * Show one Job for Employer
    */
    public function employerShowOne(Job $job, $job_id)
    {
        $id = auth()->id();
        $employer = Employer::where('user_id', $id)->first();
        $job = Job::where('id', $job_id)->first();
        if ($employer->id !== $job->employer_id) {
            return Inertia::render(
                'NotAuthorized',
                ["error" => ["details" => "You are not allowed to View this Page"]]
            );
        };
        return Inertia::render('Employer/EJob', ['job' => $job]);
    }

    /**
     * Employer Create Job
     */

    public function employerShowCreateJob()
    {
        return Inertia::render('Employer/CreateJob');
    }

    public function employerCreateJob(Request $request)
    {
        $id = auth()->id();
        $employer = Employer::where('user_id', $id)->first();
        $validated_data = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'industry' => 'required',
            'description' => 'required',
            'city' => 'required',
            'status' => 'required',

        ]);
        // dd($validated_data);

        $job = new Job($validated_data);
        $job->employer_id = $employer->id;
        $job->save();
        return Inertia::render('Employer/EJob', ['job' => $job]);
    }

    /**
     *  Employer Update Job
     */
    public function employerUpdateJob(Request $request, Job $job_id)
    {
        $job = Job::where('id', $job_id->id)->first();
        $validated_data = $request->validate([
            'title' => 'sometimes',
            'salary' => 'sometimes',
            'industry' => 'sometimes',
            'description' => 'sometimes',
            'city' => 'sometimes',
            'status' => 'sometimes',

        ]);

        $job->update($validated_data);
        $job->save();
        return Inertia::render('Employer/EJob', ['job' => $job]);
    }

    /**
        * Show all Jobs for Seeker
    */

    public function seekerShowAll()
    {
        $jobs = Job::get();
        return Inertia::render('Seeker/SJobs', ['jobs' => $jobs]);
    }


    public function seekerShowOne(Job $job, $job_id)
    {
        $job = Job::where('id', $job_id)->first();
        return Inertia::render('Seeker/SJob', ['job' => $job]);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
