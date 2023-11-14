<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Seeker;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->id();
        $employer = Employer::with('user')->where("user_id", $id)->first();
        $applicants = $employer->applications()
                ->with(['seeker','seeker.user', 'job'])
                ->get();

        /*         $id = auth()->id();
        $employer = Employer::with(
            'user',
            'jobs.applications.seeker',
            'jobs.applications.job'
        )
                            ->where('user_id', $id)
                            ->first();
        // $applicants = Application::with("seeker", "job")->where('job_id', $job->id)->all();
        return Inertia::render('Employer/EApplicants', ['applicants' => $employer]);
         */
        // $id = auth()->id();
        //     $applicants = Application::where('job_id.employer_id', $id);
        //     dd($applicants);
        return Inertia::render('Employer/EApplicants', ['applicants' => $applicants]);
    }



    /**
       * Display all seeeker Application for a Particular Job to an Employer
    */
    public function employerShowAll(Application $application, $job_id)
    {
        $id = auth()->id();
        $employer = Employer::where('user_id', $id)->first();
        $job = Job::where('id', $job_id)->first();

        if ($job->employer_id !== $employer->id) {
            return Inertia::render('NotAuthorized', ['error' => [ "details" => 'You are not Authorized to view this Page']]);
        }

        $applicants = Application::with('seeker', 'seeker.user', 'job')
            ->where('job_id', $job->id)
            ->get();

        if ($applicants->isEmpty()) {
            return Inertia::render('NotFound', ['error' => ['details' => "No Applicants For this Job"]]);

        }
        return Inertia::render('Employer/EApplicants', ['applicants' => $applicants]);
    }

    /**
                * Display a single seeeker Application for a Particular Job to an Employer
     */
    public function employerShowOne(Application $application, $application_id)
    {
        $id = auth()->id();
        $employer = Employer::where('user_id', $id)->first();

        $applicant = Application::with('seeker', 'seeker.user', 'job', )
            ->where('id', $application_id)
            ->first();

        $job = Job::where('id', $applicant->job_id)->first();
        if ($job->employer_id !== $employer->id) {
            return Inertia::render('NotAuthorized', [ "details" => 'You are not Authorized to view this Page']);
        }

        return Inertia::render('Employer/EApplicant', ['applicant' => $applicant->toArray()]);
    }


    public function employerUpdateOne(Request $request, $application_id)
    {
        $id = auth()->id();
        // dd($request->input('status'));
        $employer = Employer::where('user_id', $id)->first();

        $applicant = Application::with('seeker', 'seeker.user', 'job', )
            ->where('id', $application_id)
            ->first();

        $job = Job::where('id', $applicant->job_id)->first();
        if ($job->employer_id !== $employer->id) {
            return Inertia::render('NotAuthorized', [ "details" => 'You are not Authorized to view this Page']);
        }

        $applicant->status = $request->input('status');
        $applicant->save();
        // dd($applicant);

        return Inertia::render('Employer/EApplicant', ['applicant' => $applicant->toArray()]);
    }

    /**
         * Update Application status of the Seeker.
         */
    public function update(Request $request, Application $application)
    {
        //
    }


    /**
         * Display all seeker Application
    */

    public function seekerShowAll(Application $application)
    {
        $id = auth()->id();
        $seeker = Seeker::where("user_id", $id)->first();
        $applications = Application::with('seeker', 'seeker.user', 'job')
                                    ->where("seeker_id", $seeker->id)->get();

        // dd($applications);
        return Inertia::render('Seeker/SApplications', ['applications' => $applications]);
    }

    /**
        * Display a single seeker Application
    */

    public function seekerShowOne(Application $application, $application_id)
    {
        $id = auth()->id();
        $seeker = Seeker::where('user_id', $id)->first();

        $application = Application::with('seeker', 'seeker.user', 'job', )
            ->where('id', $application_id)
            ->first();

        if ($seeker->id !== $application->seeker_id) {
            return Inertia::render('NotAuthorized', [ "error" => ["details" => 'You are not Authorized to view this Page']]);
        }

        return Inertia::render('Seeker/SApplication', ['application' => $application->toArray()]);
    }

    public function seekerApply(Request $request)
    {
        $id = auth()->id();
        $job_id = $request->only('job_id');
        // dd($job_id);
        // dd($request);
        $seeker = Seeker::where("user_id", $id)->first();
        $application = new Application($job_id);
        $application->seeker_id = $seeker->id;
        $application->save();
        $application = Application::with('seeker', 'seeker.user', 'job')
                        ->where('id', $application->id)->first();
        // dd($application);
        return Inertia::render(
            'Seeker/SApplication',
            ["application" => $application]
        );
    }

    /**
     * Create an Application for the Seeker.
     */

    public function store(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
