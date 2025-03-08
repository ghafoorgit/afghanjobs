<x-layout>
    <div class="container mt-3">
        <h2 class="mb-3"><strong>Create Job</strong></h2>
        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="job_title" class="form-label"><strong>Job Title</strong></label>
                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{ old('job_title') }}" placeholder="Click to start writing...">
                    @error('job_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="company_name" class="form-label"><strong>Company Name</strong></label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Click to start writing...">
                    @error('company_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Education and Job Location in the same row -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="education" class="form-label"><strong>Education</strong></label>
                    <input type="text" class="form-control @error('education') is-invalid @enderror" id="education" name="education" value="{{ old('education') }}" placeholder="Click to start writing...">
                    @error('education')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="job_location" class="form-label"><strong>Job Location</strong></label>
                    <select class="form-select select2 @error('job_location') is-invalid @enderror" id="job_location" name="job_location[]" multiple>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}" @if(collect(old('job_location'))->contains($province->id)) selected @endif>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="work_duration_id" class="form-label"><strong>Work Duration</strong></label>
                    <select class="form-select select2 @error('work_duration_id') is-invalid @enderror" id="work_duration_id" name="work_duration_id">
                        <option value="">Select Work Duration</option>
                        @foreach($workDurations as $duration)
                            <option value="{{ $duration->id }}" @selected(old('work_duration_id') == $duration->id)>{{ $duration->name }}</option>
                        @endforeach
                    </select>
                    @error('work_duration_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="gender_id" class="form-label"><strong>Gender</strong></label>
                    <select class="form-select select2 @error('gender_id') is-invalid @enderror" id="gender_id" name="gender_id">
                        <option value="">Select Gender</option>
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}" @selected(old('gender_id') == $gender->id)>{{ $gender->name }}</option>
                        @endforeach
                    </select>
                    @error('gender_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="post_date" class="form-label"><strong>Post Date</strong></label>
                    <input type="date" class="form-control @error('post_date') is-invalid @enderror" id="post_date" name="post_date" value="{{ old('post_date') }}">
                    @error('post_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="closing_date" class="form-label"><strong>Closing Date</strong></label>
                    <input type="date" class="form-control @error('closing_date') is-invalid @enderror" id="closing_date" name="closing_date" value="{{ old('closing_date') }}">
                    @error('closing_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="reference_number" class="form-label"><strong>Reference Number</strong></label>
                    <input type="text" class="form-control @error('reference_number') is-invalid @enderror" id="reference_number" name="reference_number" value="{{ old('reference_number') }}" placeholder="Click to start writing...">
                    @error('reference_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="number_of_vacancies" class="form-label"><strong>Number of Vacancies</strong></label>
                    <input type="number" class="form-control @error('number_of_vacancies') is-invalid @enderror" id="number_of_vacancies" name="number_of_vacancies" value="{{ old('number_of_vacancies') }}" placeholder="Click to start writing...">
                    @error('number_of_vacancies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="salary_range" class="form-label"><strong>Salary Range</strong></label>
                    <input type="text" class="form-control @error('salary_range') is-invalid @enderror" id="salary_range" name="salary_range" value="{{ old('salary_range') }}" placeholder="Click to start writing...">
                    @error('salary_range')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="years_of_experience" class="form-label"><strong>Years of Experience</strong></label>
                    <input type="text" class="form-control @error('years_of_experience') is-invalid @enderror" id="years_of_experience" name="years_of_experience" value="{{ old('years_of_experience') }}" placeholder="Click to start writing...">
                    @error('years_of_experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="probationary_period" class="form-label"><strong>Probationary Period</strong></label>
                    <input type="text" class="form-control @error('probationary_period') is-invalid @enderror" id="probationary_period" name="probationary_period" value="{{ old('probationary_period') }}" placeholder="Click to start writing...">
                    @error('probationary_period')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="contract_type_id" class="form-label"><strong>Contract Type</strong></label>
                    <select class="form-select select2 @error('contract_type_id') is-invalid @enderror" id="contract_type_id" name="contract_type_id">
                        <option value="">Select Contract Type</option>
                        @foreach($contractTypes as $type)
                            <option value="{{ $type->id }}" @selected(old('contract_type_id') == $type->id)>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('contract_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <label for="about_company" class="form-label"><strong>About Company</strong></label>
                <textarea class="form-control @error('about_company') is-invalid @enderror" id="about_company" name="about_company" rows="3" placeholder="Click to start writing...">{{ old('about_company') }}</textarea>
                @error('about_company')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="job_summary" class="form-label"><strong>Job Summary</strong></label>
                <textarea class="form-control @error('job_summary') is-invalid @enderror" id="job_summary" name="job_summary" rows="3" placeholder="Click to start writing...">{{ old('job_summary') }}</textarea>
                @error('job_summary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="duties_responsibilities" class="form-label"><strong>Duties & Responsibilities</strong></label>
                <textarea class="form-control @error('duties_responsibilities') is-invalid @enderror" id="duties_responsibilities" name="duties_responsibilities" rows="5" placeholder="Click to start writing...">{{ old('duties_responsibilities') }}</textarea>
                @error('duties_responsibilities')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="job_requirements" class="form-label"><strong>Job Requirements</strong></label>
                <textarea class="form-control @error('job_requirements') is-invalid @enderror" id="job_requirements" name="job_requirements" rows="5" placeholder="Click to start writing...">{{ old('job_requirements') }}</textarea>
                @error('job_requirements')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="submission_guideline" class="form-label"><strong>Submission Guideline</strong></label>
                <textarea class="form-control @error('submission_guideline') is-invalid @enderror" id="submission_guideline" name="submission_guideline" rows="3" placeholder="Click to start writing...">{{ old('submission_guideline') }}</textarea>
                @error('submission_guideline')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="submission_email" class="form-label"><strong>Submission Email</strong></label>
                <input type="email" class="form-control @error('submission_email') is-invalid @enderror" id="submission_email" name="submission_email" value="{{ old('submission_email') }}" placeholder="Click to start writing...">
                @error('submission_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Logo field -->
            <div class="mt-3">
                <label for="logo" class="form-label"><strong>Logo (Optional)</strong></label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Job</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function addBulletOnFocus(event) {
                let textarea = event.target;
                if (textarea.value.trim() === "") {
                    textarea.value = "• ";
                }
            }

            function addBulletOnEnter(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    let textarea = event.target;
                    let cursorPos = textarea.selectionStart;
                    let textBefore = textarea.value.substring(0, cursorPos);
                    let textAfter = textarea.value.substring(cursorPos);

                    // Insert a new bullet point
                    textarea.value = textBefore + "\n• " + textAfter;
                    textarea.selectionStart = textarea.selectionEnd = cursorPos + 3;
                }
            }

            // Select both textareas and attach event listeners
            let textareas = document.querySelectorAll("#duties_responsibilities, #job_requirements");
            textareas.forEach(textarea => {
                textarea.addEventListener("focus", addBulletOnFocus);  // Add bullet when clicking
                textarea.addEventListener("keydown", addBulletOnEnter); // Add bullet on Enter
            });
        });
    </script>

</x-layout>
