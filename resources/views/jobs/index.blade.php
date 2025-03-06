<x-layout>
    <style>
        /* Job Card Wrapper */
        .job-card-wrapper {
            transition: transform 0.3s ease-in-out; /* Smooth transform effect */
        }

        /* Hover effect for the card */
        .job-card-wrapper:hover {
            transform: translateY(-5px); /* Elevate the card slightly on hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
        }

        /* Default striping effect for alternating rows */
        .job-card-wrapper:nth-child(odd) .job-card {
            background-color: #ffffff; /* White background for odd rows */
        }

        .job-card-wrapper:nth-child(even) .job-card {
            background-color: #f1f1f1; /* Light gray background for even rows */
        }

        /* Card Styling */
        .job-card {
            border: 1px solid #ddd; /* Light border around the card */
            border-radius: 8px; /* Rounded corners for the cards */
            padding: 15px; /* Padding inside the card */
        }

        /* Card title hover effect */
        .job-card .card-title:hover {
            text-decoration: none;
            color: #007bff; /* Change text color on hover */
        }

        /* Styling for card links */
        .job-card .card-title a {
            text-decoration: none;
            color: inherit; /* Inherit the color of the title */
        }

        .job-card .card-title a:hover {
            color: #007bff; /* Blue color for hover */
        }
    </style>
    <div class="mt-4">
        <x-session-message />
    </div>

    <!-- Jobs Section -->
    <div class="container mt-3">
        <h2 class="text-center mb-4">Available Jobs</h2>
        <div class="table table-striped table-hover">
            <div class="row">
                <!-- Job Cards -->
                @foreach ($jobs as $job)
                    <div class="col-md-12 mb-4 job-card-wrapper">
                        <div class="card h-100 job-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <h5 class="card-title mb-0" style="font-weight: bold; text-decoration: underline; cursor: pointer;">
                                        <a href="{{ route('jobs.show', $job->id) }}" class="text-decoration-none text-dark">
                                            {{ $job->job_title }}
                                        </a>
                                    </h5>
                                    <p class="mb-0"><strong>Opening Date:</strong> {{ \Carbon\Carbon::parse($job->post_date)->format('M d, Y') }}</p>
                                    <p class="mb-0"><strong>Closing Date:</strong> {{ \Carbon\Carbon::parse($job->closing_date)->format('M d, Y') }}</p>
                                    <p class="mb-0"><strong>Location:</strong> {{ $job->job_location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination Section -->
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-layout>
