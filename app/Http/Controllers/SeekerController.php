<?php

namespace App\Http\Controllers;

// use App\Models\Seeker;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Seeker;
use App\Models\Application;
use App\Models\Job;
use App\Models\Qualification;

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
        $jobs = Job::where('title', $seeker->profession || 'industry', $seeker->industry)->take(10)->get();
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
                'seeker' => $seeker, $qualifications, $experiences,
                // 'message' => 'Seeker Profile'
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
            ['firstname', 'lastname', 'username', 'email']
        ) as $key => $value) {
            if ($seeker->user->{$key} !== $value) {
                $userFields[$key] = $value;
            }
        }

        foreach ($validatedData as $key => $value) {
            if ($key === 'qualification') {
                foreach ($validatedData[$key] as $k => $v) {
                    $qualification[$k] = $v;
                }
            }
            if ($key === 'experience') {
                foreach ($validatedData[$key] as $k => $v) {
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
            $cvFile = $request->file('cv');
            $cvName = 'cv_' . $user . '.' . 'pdf';
            $cv_path = $cvFile->storeAs("cvs/$user", $cvName, 'public');
            $seeker->cv = $cv_path;
            $seeker->save();
        }

        if ($request->hasFile('visa')) {
            $visaFile = $request->file('visa');
            $visaName = 'visa_' . $user . '.' . 'pdf';
            $visa_path = $visaFile->storeAs("visas/$user", $visaName, 'public');
            $seeker->visa = $visa_path;
            $seeker->save();
        }

        if ($request->hasFile('passport')) {
            $passportFile = $request->file('passport');
            $passportName = 'passport_' . $user . '.' . 'pdf';
            $passport_path = $passportFile->storeAs("passports/$user", $passportName, 'public');
            $seeker->passport = $passport_path;
            $seeker->save();
        }

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarName = 'avatar_' . $user . '.' . $avatarFile->getClientOriginalExtension();
            $avatar_path = $avatarFile->storeAs("avatars/$user", $avatarName, 'public');
            $seeker->user->avatar = $avatar_path;
            $seeker->user->save();
        }
        // dd($seeker->user);
        $qualifications = $seeker->qualifications;
        $experiences = $seeker->experiences;
        // return Inertia::render(
        //     'Seeker/SProfile',
        //     [
        //         'seeker' => $seeker, $qualifications, $experiences,
        //         'message' => ['detail' => 'Seeker Profile Updated']
        //     ]
        // );

        return redirect()->route('seeker.profile');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Seeker $seeker)
    // {
    //     //
    // }
}
