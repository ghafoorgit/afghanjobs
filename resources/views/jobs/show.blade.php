<x-layout>
    <!-- Add the Back to Jobs button at the top left -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <!-- Top-left Back to Jobs Button -->
                        <div class="position-absolute" style="top: 10px; left: 10px;">
                            <a href="{{ route('jobs.index') }}" class="btn btn-secondary btn-sm">Back to Jobs</a>
                        </div>

                        @if ($job->logo)
                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{ asset('storage/'.$job->logo) }}" alt="Company Logo" width="120" height="120" class="rounded-circle shadow">
                            </div>
                        @endif

                        <h2 class="mb-4"><strong>{{ $job->job_title }}</strong></h2>

                        <div class="row text-start">
                            <!-- Second Column (Job Details Table) - Should appear first on smaller screens -->
                            <div class="col-md-5 order-1 order-md-2">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Company Name:</th>
                                            <td>{{ $job->company_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Education:</th>
                                            <td>{{ $job->education ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Job Location:</th>
                                            <td>
                                                @if ($job->provinces->isNotEmpty())
                                                    @foreach ($job->provinces as $location)
                                                        {{ $location->name }}@if(!$loop->last), @endif
                                                    @endforeach
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Work Duration:</th>
                                            <td>{{ $job->workDuration->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender:</th>
                                            <td>{{ $job->gender->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Post Date:</th>
                                            <td>{{ $job->post_date ? \Carbon\Carbon::parse($job->post_date)->format('d M, Y') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Closing Date:</th>
                                            <td>{{ $job->closing_date ? \Carbon\Carbon::parse($job->closing_date)->format('d M, Y') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Reference Number:</th>
                                            <td>{{ $job->reference_number ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Number of Vacancies:</th>
                                            <td>{{ $job->number_of_vacancies ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Salary Range:</th>
                                            <td>{{ $job->salary_range ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Years of Experience:</th>
                                            <td>{{ $job->years_of_experience ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Probationary Period:</th>
                                            <td>{{ $job->probationary_period ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contract Type:</th>
                                            <td>{{ $job->contractType->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Submission Email:</th>
                                            <td>{{ $job->submission_email ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- First Column (Job Description & Requirements) - Should appear second on smaller screens -->
                            <div class="col-md-7 px-4 order-2 order-md-1">
                                <h5><strong>About Company</strong></h5>
                                <p>{{ $job->about_company ?? 'N/A' }}</p>

                                <h5><strong>Job Summary</strong></h5>
                                <p>{{ $job->job_summary ?? 'N/A' }}</p>

                                <h5><strong>Duties & Responsibilities</strong></h5>
                                @if (!empty($job->duties_responsibilities))
                                    <ul>
                                        @foreach ($job->duties_responsibilities as $duty)
                                            <li>{{ ltrim($duty, '• ') }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>N/A</p>
                                @endif

                                <h5><strong>Job Requirements</strong></h5>
                                @if (!empty($job->job_requirements))
                                    <ul>
                                        @foreach ($job->job_requirements as $requirement)
                                            <li>{{ ltrim($requirement, '• ') }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>N/A</p>
                                @endif

                                <h5><strong>Submission Guideline</strong></h5>
                                <p>{{ $job->submission_guideline ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('jobs.index') }}" class="btn btn-secondary btn-sm">Back to Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS to style the table -->
    <style>
        table tr {
            border-bottom: 1px solid #ddd;
        }

        table th, table td {
            border: none;
        }
    </style>
</x-layout>
