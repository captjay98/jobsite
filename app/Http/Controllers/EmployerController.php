<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log ;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Application;
use App\Models\Job;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->id();
        $employer = Employer::with('user')->where('user_id', $id)->first();
        $applications = $employer->applications()
                    ->with('seeker', 'seeker.user', 'job')
                    ->get();
        $jobs = Job::where('employer_id', $employer->id)->get();
        return Inertia::render(
            'Employer/EDashboard',
            [
                'employer' => $employer ,
                'applications' => $applications->toArray(),
                'jobs' => $jobs->toArray()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function show()
    {
        $id = auth()->id();
        // $employer = Employer::with('user')->get();
        $employer = Employer::with('user')
                            ->where('user_id', $id)
                            ->first();
        // return response()->json(['EMPLOYER' => $employer]);
        return Inertia::render('Employer/EProfile', ['employer' => $employer]);
        //
    }

    public function update(Request $request)
    {
        $id = auth()->id();
        $request->validate([
                'firstname' => 'sometimes|alpha',
                'lastname' => 'sometimes|alpha',
                'username' => 'sometimes|alpha_num|unique:users,username,' . $id,
                'email' => 'sometimes|email|unique:users,email,' . $id,
                ]);


        $employer = Employer::with('user')->where('user_id', $id)->first();

        $updatedFields = [];

        foreach ($request->only(
            ['firstname','lastname','username', 'email']
        ) as $key => $value) {
            if ($employer->user->{$key} !== $value) {
                $updatedFields[$key] = $value;
            }
        }

        $employer->user->update($updatedFields);

        return Inertia::render('Employer/EProfile', ['success' => ["details" => "Update Successful"]]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
