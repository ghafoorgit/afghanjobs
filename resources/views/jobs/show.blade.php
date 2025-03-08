<x-layout>
    <div class="container mt-3">
        <h2 class="mb-3"><strong>Job Details: {{ $job->job_title }}</strong></h2>

        <div class="row">
            <!-- First Column with sections -->
            <div class="col-md-6">
                <div class="mb-3">
                    <h5><strong>About Company</strong></h5>
                    <p>{{ $job->about_company }}</p>
                </div>

                <div class="mb-3">
                    <h5><strong>Job Summary</strong></h5>
                    <p>{{ $job->job_summary }}</p>
                </div>

                <div class="mb-3">
                    <h5><strong>Duties & Responsibilities</strong></h5>
                    <p>{{ $job->duties_responsibilities }}</p>
                </div>

                <div class="mb-3">
                    <h5><strong>Job Requirements</strong></h5>
                    <p>{{ $job->job_requirements }}</p>
                </div>

                <div class="mb-3">
                    <h5><strong>Submission Guideline</strong></h5>
                    <p>{{ $job->submission_guideline }}</p>
                </div>
            </div>

            <!-- Second Column with other attributes -->
            <div class="col-md-6">
                <div class="mb-3">
                    <strong>Company Name:</strong> {{ $job->company_name }}
                </div>
                <div class="mb-3">
                    <strong>Education:</strong> {{ $job->education }}
                </div>
                <div class="mb-3">
                    <strong>Job Location:</strong>
                    @foreach($job->provinces as $location)
                        {{ $location->name }} @if(!$loop->last), @endif
                    @endforeach
                </div>
                <div class="mb-3">
                    <strong>Work Duration:</strong> {{ $job->workDuration->name }}
                </div>
                <div class="mb-3">
                    <strong>Gender:</strong> {{ $job->gender->name }}
                </div>
                <div class="mb-3">
                    <strong>Post Date:</strong> {{ \Carbon\Carbon::parse($job->post_date)->format('d M, Y') }}
                </div>
                <div class="mb-3">
                    <strong>Closing Date:</strong> {{ \Carbon\Carbon::parse($job->closing_date)->format('d M, Y') }}
                </div>
                <div class="mb-3">
                    <strong>Reference Number:</strong> {{ $job->reference_number }}
                </div>
                <div class="mb-3">
                    <strong>Number of Vacancies:</strong> {{ $job->number_of_vacancies }}
                </div>
                <div class="mb-3">
                    <strong>Salary Range:</strong> {{ $job->salary_range }}
                </div>
                <div class="mb-3">
                    <strong>Years of Experience:</strong> {{ $job->years_of_experience }}
                </div>
                <div class="mb-3">
                    <strong>Probationary Period:</strong> {{ $job->probationary_period }}
                </div>
                <div class="mb-3">
                    <strong>Contract Type:</strong> {{ $job->contractType->name }}
                </div>
                <div class="mb-3">
                    <strong>Submission Email:</strong> {{ $job->submission_email }}
                </div>
                @if($job->logo)
                    <div class="mb-3">
                        <strong>Logo:</strong><br>
                        <img src="{{ asset('storage/'.$job->logo)}}" alt="Job Logo" width="150">
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Jobs</a>
        </div>
    </div>
</x-layout>
