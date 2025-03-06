<x-layout>
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
                    <div class="col-md-12 mb-4">
                        <div class="card h-100">
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
