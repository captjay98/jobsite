<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
    * Public Route
    */
    public function getAllJobs()
    {
        $jobs = Job::get();
        return Inertia::render('HomeJobsAll', ['jobs' => $jobs]);

    }

    public function getJob($job_id)
    {
        $job = Job::where('id', $job_id)->first();
        return Inertia::render('HomeJobsOne', ['job' => $job]);

    }

    public function searchJobs(Request $request)
    {
        // dd($request->all());
        $validated_data = $request->validate([
            'profession' => 'sometimes',
            'location' => 'sometimes',
            'industry' => 'sometimes',
            'salary' => 'sometimes',
        ]);
        $profession = $validated_data['profession'];
        $industry = $validated_data['industry'];
        $location = $validated_data['location'];
        $salary = $validated_data['salary'];

        if ($profession && $location && $industry && $salary) {
            $jobs = Job::where(['title' => $profession,
                                'city' => $location,
                                'industry' => $industry,
                                'salary' => $salary])->get();

        } elseif ($profession && $industry) {
            $jobs = Job::where(['title' => $profession,
                                'industry' => $industry])->get();

        } elseif ($profession) {

            $jobs = Job::where('title', $profession)->get();

        } elseif ($industry) {
            $jobs = Job::where('title', $industry)->get();

        } elseif ($location) {
            $jobs = Job::where('city', $location)->get();

        } elseif ($salary) {
            $jobs = Job::where('salary', $salary)->get();

        } else {
            return Inertia::render('HomeJobs', [
                'jobs' => Job::all(),
                "message" => "Sorry, We couldn't find Jobs Matching Your Criteria."]);
        }
        return Inertia::render('HomeJobsAll', ['jobs' => $jobs]);
    }




    /**
     * Show all Jobs for Employer
     */


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
        // dd($request->all());
        $validated_data = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'industry' => 'required',
            'description' => 'required',
            'company' => 'required',
            'logo' => 'sometimes',
            'city' => 'required',
            'status' => 'required',

        ]);

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


    public function seekerSearchJobs(Request $request)
    {
        // dd($request->all());
        $validated_data = $request->validate([
            'profession' => 'sometimes',
            'location' => 'sometimes',
            'industry' => 'sometimes',
            'salary' => 'salary',
        ]);
        $profession = $validated_data['profession'];
        $industry = $validated_data['industry'];
        $location = $validated_data['location'];
        $salary = $validated_data['salary'];

        if ($profession && $location && $industry && $salary) {
            $jobs = Job::where(['title' => $profession,
                                'city' => $location,
                                'industry' => $industry,
                                'salary' => $salary])->get();
            // dd($jobs);

        } elseif ($profession && $industry) {
            $jobs = Job::where(['title' => $profession,
                                'industry' => $industry])->get();
            // dd($jobs);

        } elseif ($profession) {

            $jobs = Job::where('title', $profession)->get();
            // dd($jobs);

        } elseif ($industry) {
            $jobs = Job::where('title', $industry)->get();
            // dd($jobs);

        } elseif ($location) {
            $jobs = Job::where('city', $location)->get();

        } elseif ($salary) {
            $jobs = Job::where('salary', $salary)->get();

            // dd($jobs);

        } else {
            return Inertia::render('Seeker/SJobs', [
                'jobs' => Job::all(),
                "message" => "Sorry, We couldn't find Jobs Matching Your Criteria."]);
        }
        // $keyword = $validated_data['keyword'];
        // dd($jobs);
        return Inertia::render('Seeker/SJobs', ['jobs' => $jobs]);
    }


    /**
     * Show One Job.
     */

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
        Job::delete($job);
        //
    }
}
