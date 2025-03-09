<x-layout>
    <style>
        /* Job Card Wrapper */
        .job-card-wrapper {
            transition: transform 0.3s ease-in-out; /* Smooth transform effect */
        }

        /* Hover effect for the card */
        .job-card-wrapper:hover {
            transform: translateY(-5px); /* Elevate the card slightly on hover */
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

        /* Aligning Available Jobs title and Post Job button */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .post-job-button {
            background-color: #007bff;
            color: white;
            border: none;
            margin-top: 12px;
            padding: 7px 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .post-job-button:hover {
            background-color: #0056b3;
        }

        /* Actions Button Styling */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-buttons button.edit {
            background-color: #ffc107;
        }

        .action-buttons button.delete {
            background-color: #dc3545;
        }

        .action-buttons button:hover {
            opacity: 0.8;
        }
    </style>

    <div class="mt-4">
        <x-session-message />
    </div>

    <!-- Jobs Section -->
    <div class="container mt-3 rounded" style="background-color: #f0f0f0;">
        <div class="header-section mb-4">
            <h2 class="text-center mb-0">Posted Jobs</h2>
            <a href="{{ route('jobs.create') }}">
                <button class="post-job-button">Post Job</button>
            </a>
        </div>

        <div class="table table-striped table-hover">
            <div class="row">
                <!-- Job Cards -->
                @foreach ($jobs as $job)
                    <div class="col-md-12 mb-4 job-card-wrapper">
                        <div class="card h-100 job-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <h5 class="card-title mb-0" style="font-weight: bold; cursor: pointer;">
                                        <a href="{{ route('jobs.show', $job->id) }}" class="text-decoration-none text-dark" style="color:blue;">
                                            {{ $job->job_title }}
                                        </a>
                                    </h5>
                                    <p class="mb-0"><strong>Opening Date:</strong> {{ \Carbon\Carbon::parse($job->post_date)->format('M d, Y') }}</p>
                                    <p class="mb-0"><strong>Closing Date:</strong> {{ \Carbon\Carbon::parse($job->closing_date)->format('M d, Y') }}</p>
                                    <p class="mb-0"><strong>Location:</strong> {{ $job->provinces->pluck('name')->implode(',') }}</p>
                                </div>
                                <div class="action-buttons mt-3">
                                    <!-- Show Button -->
                                    <a href="{{ route('jobs.show', $job->id) }}">
                                        <button class="btn btn-info">Show</button>
                                    </a>
                                    <!-- Edit Button -->
                                    <a href="{{ route('jobs.edit', $job->id) }}">
                                        <button class="btn btn-warning edit">Edit</button>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete">Delete</button>
                                    </form>
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
