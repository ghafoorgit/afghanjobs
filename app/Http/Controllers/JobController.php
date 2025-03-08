<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Gender;
use App\Models\ContractType;
use App\Models\WorkDuration;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::latest()->paginate(6);
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        $contractTypes = ContractType::all();
        $workDurations = WorkDuration::all();
        $genders = Gender::all();
        return view('jobs.create', compact('contractTypes', 'workDurations', 'genders'));
    }

    /**
     * Store a newly created job.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'job_location' => 'required',
            'education' => 'required',
            'post_date' => 'required|date',
            'closing_date' => 'required|date',
            'reference_number' => 'required|unique:jobs',
            'number_of_vacancies' => 'required|integer',
            'salary_range' => 'required',
            'years_of_experience' => 'required',
            'probationary_period' => 'required|string', // Updated validation
            'contract_type_id' => 'required|exists:contract_types,id',
            'work_duration_id' => 'required|exists:work_durations,id',
            'gender_id' => 'required|exists:genders,id',
            'about_company' => 'required',
            'job_summary' => 'required',
            'duties_responsibilities' => 'required',
            'job_requirements' => 'required',
            'submission_guideline' => 'required',
            'submission_email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Logo validation (optional)
        ]);

        // Handle file upload for the logo if it is provided
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Create a new Job record with the validated data
        Job::create([
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'job_location' => $request->job_location,
            'education' => $request->education,
            'post_date' => $request->post_date,
            'closing_date' => $request->closing_date,
            'reference_number' => $request->reference_number,
            'number_of_vacancies' => $request->number_of_vacancies,
            'salary_range' => $request->salary_range,
            'years_of_experience' => $request->years_of_experience,
            'probationary_period' => $request->probationary_period,
            'contract_type_id' => $request->contract_type_id,
            'work_duration_id' => $request->work_duration_id,
            'gender_id' => $request->gender_id,
            'about_company' => $request->about_company,
            'job_summary' => $request->job_summary,
            'duties_responsibilities' => $request->duties_responsibilities,
            'job_requirements' => $request->job_requirements,
            'submission_guideline' => $request->submission_guideline,
            'submission_email' => $request->submission_email,
            'logo' => $logoPath, // Store the logo path if uploaded
        ]);

        // Redirect with success message
        return redirect()->route('jobs.index')->with('message', 'Job created successfully.');
    }



    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing a job.
     */
    public function edit(Job $job)
    {
        $contractTypes = ContractType::all();
        $workDurations = WorkDuration::all();
        $genders = Gender::all();
        return view('jobs.edit', compact('job', 'contractTypes', 'workDurations', 'genders'));
    }

    /**
     * Update the job.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'job_location' => 'required',
            'education' => 'required',
            'post_date' => 'required|date',
            'closing_date' => 'required|date',
            'reference_number' => 'required|unique:jobs,reference_number,' . $job->id,
            'number_of_vacancies' => 'required|integer',
            'salary_range' => 'required',
            'years_of_experience' => 'required',
            'probationary_period' => 'required|string', // Updated validation
            'contract_type_id' => 'required|exists:contract_types,id',
            'work_duration_id' => 'required|exists:work_durations,id',
            'gender_id' => 'required|exists:genders,id',
            'about_company' => 'required',
            'job_summary' => 'required',
            'duties_responsibilities' => 'required',
            'job_requirements' => 'required',
            'submission_guideline' => 'required',
            'submission_email' => 'required|email',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }


    /**
     * Remove the job.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
