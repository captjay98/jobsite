<?php

namespace App\Http\Controllers;

// use App\Models\Seeker;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Seeker;
use App\Models\Application;
use App\Models\Job;

class SeekerController extends Controller
{
    /**
     * Display Seeker Dashboard.
     */
    public function index()
    {
        $id = Auth()->id();
        $seeker = Seeker::with('user')
                        ->where('user_id', $id)
                        ->first();
        $applications = Application::with('seeker', 'seeker.user', 'job')
                                    ->where("seeker_id", $seeker->id)
                                    ->orderBy('updated_at', 'DESC')
                                    ->take(5)
                                    ->get();
        $jobs = Job::where('industry', 'Healthcare')->take(5)->get();
        return Inertia::render(
            'Seeker/SDashboard',
            [
                'seeker' => $seeker,
                'applications' => $applications->toArray(),
                'jobs' => $jobs->toArray()
            ],
        );
    }

    /**
     * Display Seeker Profile.
     */
    public function show()
    {
        $id = auth()->id();
        $seeker = Seeker::with('user')->where('user_id', $id)->first();
        $qualifications = $seeker->qualifications;
        $experiences = $seeker->experiences;
        return Inertia::render(
            'Seeker/SProfile',
            [
                'seeker' => $seeker,$qualifications,$experiences
            ]
        );
    }

    /**
     * Update Seeker PROFILE Details.
     */
    public function update(Request $request)
    {
        $id = auth()->id();
        $user = $request->user()->username;
        $seeker = Seeker::with('user')->where('user_id', $id)->first();
        // dd($request->all());

        $validatedData = $request->validate([
            'avatar' => 'sometimes',
            'firstname' => 'sometimes|alpha',
            'lastname' => 'sometimes|alpha',
            'username' => 'sometimes|alpha_num|unique:users,username,' . $id,
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'phone' => 'sometimes',
            'dateofbirth' => 'sometimes',
            'city' => 'sometimes',
            'state' => 'sometimes',
            'country' => 'sometimes',
            'ethnicity' => 'sometimes',
            'qualification' => 'sometimes',
            'experience' => 'sometimes',
            'skills' => 'sometimes',
            'cv' => 'sometimes',
            'visa' => 'sometimes',
            'passport' => 'sometimes',
        ]);


        $userFields = [];
        $seekerFields = [];
        $qualification = [];
        $experience = [];

        foreach ($request->only(
            ['firstname','lastname','username', 'email']
        ) as $key => $value) {
            if ($seeker->user->{$key} !== $value) {
                $userFields[$key] = $value;
            }
        }

        foreach ($validatedData as $key => $value) {
            if($key === 'qualification') {
                foreach($validatedData[$key] as $k => $v) {
                    $qualification[$k] = $v;
                }
            }
            if($key === 'experience') {
                foreach($validatedData[$key] as $k => $v) {
                    $experience[$k] = $v;
                }
            }

            if ($seeker->{$key} !== $value) {
                $seekerFields[$key] = $value;
            }
        }
        $seeker->user->update($userFields);
        $seeker->update($seekerFields);
        if ($qualification && $request->filled('qualification')) {
            $seeker->qualifications()->create($qualification);
        }

        if ($experience) {
            $seeker->experiences()->create($experience);
        }

        // $fileName = "";
        // if ($request->hasFile("$fileName")) {
        //     $file_path = $request->file("$fileName")->store("$fileName" + "s" + "/$user", 'local');
        //     $seeker->$fileName = $file_path;
        //     $seeker->save;
        // }
        if ($request->hasFile('cv')) {
            $cv_path = $request->file('cv')->store("cvs/$user", 'local');
            $seeker->cv = $cv_path;
            $seeker->save();
            // dd($cv_path);
        }
        if ($request->hasFile('visa')) {
            $visa_path = $request->file('visa')->store("visas/$user", 'local');
            $seeker->visa = $visa_path;
            $seeker->save();
            // dd($visa_path);
        }
        if ($request->hasFile('passport')) {
            $passport_path = $request->file('passport')->store("passports/$user", 'local');
            $seeker->passport = $passport_path;
            $seeker->save();
        }
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store("avatars/$user", 'local');
            $seeker->avatar = $avatar_path;
            $seeker->save();
        }

        return redirect()->route('seeker.update')->with('message', 'Profile Updated Succesfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Seeker $seeker)
    // {
    //     //
    // }
}
