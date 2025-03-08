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
}
