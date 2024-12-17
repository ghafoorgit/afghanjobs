<x-layout>
    <!-- Full-width Image Section -->
    <div>
        <img src="{{ asset('system_images/homepage_horizontal.webp') }}" alt="Job Search Image" class="img-fluid w-100" style="height: 40vh; object-fit: cover;">
    </div>

    <!-- Jobs Section -->
    <div class="container mt-3">
        <h2 class="text-center mb-4">Available Jobs</h2>
        <div class="row">
            <!-- Job Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold; text-decoration: underline; cursor: pointer;">Software Engineer</h5>
                        <p class="card-text">We are looking for a skilled software engineer to join our team.</p>
                        <p><strong>Opening Date:</strong> Jan 1, 2024</p>
                        <p><strong>Closing Date:</strong> Jan 31, 2024</p>
                        <p><strong>Location:</strong> New York, NY</p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold; text-decoration: underline; cursor: pointer;">Project Manager</h5>
                        <p class="card-text">Manage projects from inception to delivery with our team.</p>
                        <p><strong>Opening Date:</strong> Feb 1, 2024</p>
                        <p><strong>Closing Date:</strong> Feb 28, 2024</p>
                        <p><strong>Location:</strong> San Francisco, CA</p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Job Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold; text-decoration: underline; cursor: pointer;">UX/UI Designer</h5>
                        <p class="card-text">Design user-friendly and visually appealing interfaces.</p>
                        <p><strong>Opening Date:</strong> Mar 1, 2024</p>
                        <p><strong>Closing Date:</strong> Mar 31, 2024</p>
                        <p><strong>Location:</strong> Remote</p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
