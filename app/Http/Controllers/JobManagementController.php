<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Gender;
use App\Models\Province;
use App\Models\ContractType;
use App\Models\WorkDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class JobManagementController extends Controller
{

    public function index()
    {
        $jobs = Job::latest()->paginate(6);
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $contractTypes = ContractType::all();
        $workDurations = WorkDuration::all();
        $provinces = Province::all();
        $genders = Gender::all();
        return view('jobs.create', compact('contractTypes', 'workDurations','provinces', 'genders'));
    }

    /**
     * Store a newly created job.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_location' => 'required|array',
            'job_location.*' => 'exists:provinces,id',
            'work_duration_id' => 'nullable|exists:work_durations,id',
            'gender_id' => 'nullable|exists:genders,id',
            'post_date' => 'required|date',
            'closing_date' => 'required|date|after_or_equal:post_date',
            'reference_number' => 'nullable|string|max:255',
            'number_of_vacancies' => 'nullable|integer|min:1',
            'salary_range' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'probationary_period' => 'nullable|string|max:255',
            'contract_type_id' => 'nullable|exists:contract_types,id',
            'about_company' => 'nullable|string',
            'job_summary' => 'nullable|string',
            'duties_responsibilities' => 'nullable|string',
            'job_requirements' => 'nullable|string',
            'submission_guideline' => 'nullable|string',
            'submission_email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('job_location', 'logo');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $job = Job::create($data);
        $job->provinces()->sync($request->job_location);

        return redirect()->route('jobs.index')->with('message', 'Job created successfully!');
    }





    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $contractTypes = ContractType::all();
        $workDurations = WorkDuration::all();
        $provinces = Province::all();
        $genders = Gender::all();

        // Pass the job and the other data to the view
        return view('jobs.edit', compact('job', 'contractTypes', 'workDurations', 'provinces', 'genders'));
    }

    /**
     * Update the job.
     */
    public function update(Request $request, Job $job)
    {
        // Validate the incoming request
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_location' => 'required|array',
            'job_location.*' => 'exists:provinces,id',
            'work_duration_id' => 'nullable|exists:work_durations,id',
            'gender_id' => 'nullable|exists:genders,id',
            'post_date' => 'required|date',
            'closing_date' => 'required|date|after_or_equal:post_date',
            'reference_number' => 'nullable|string|max:255',
            'number_of_vacancies' => 'nullable|integer|min:1',
            'salary_range' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'probationary_period' => 'nullable|string|max:255',
            'contract_type_id' => 'nullable|exists:contract_types,id',
            'about_company' => 'nullable|string',
            'job_summary' => 'nullable|string',
            'duties_responsibilities' => 'nullable|string',
            'job_requirements' => 'nullable|string',
            'submission_guideline' => 'nullable|string',
            'submission_email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare the data to update
        $data = $request->except('job_location', 'logo');

        // Handle the logo upload if it's provided
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($job->logo) {
                Storage::delete($job->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Update the job record
        $job->update($data);

        // Sync the provinces (job locations) selected
        $job->provinces()->sync($request->job_location);

        return redirect()->route('jobs.index')->with('message', 'Job updated successfully!');
    }



    /**
     * Remove the job.
     */




     public function destroy(Job $job)
    {
        // Check if the job has a logo
        if ($job->logo) {
            // Use the path from $job->logo directly
            $logoPath = $job->logo;

            // Check if the logo exists in storage before attempting to delete
            if (Storage::exists($logoPath)) {
                // Delete the logo file from local storage (storage/app/public/logos)
                Storage::delete($logoPath);
            }
        }

        // Delete the job from the database
        $job->delete();

        // Redirect with a success message
        return redirect()->route('jobs.index')->with('message', 'The job and its logo have been deleted successfully!');
    }
}
