<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('education');
            $table->date('post_date');
            $table->date('closing_date');
            $table->string('reference_number')->unique();
            $table->integer('number_of_vacancies');
            $table->string('salary_range');
            $table->string('years_of_experience');
            $table->string('probationary_period');
            $table->foreignId('contract_type_id')->constrained('contract_types')->onDelete('cascade');
            $table->foreignId('work_duration_id')->constrained('work_durations')->onDelete('cascade');
            $table->foreignId('gender_id')->constrained('genders')->onDelete('cascade');
            $table->text('about_company');
            $table->text('job_summary');
            $table->text('duties_responsibilities');
            $table->text('job_requirements');
            $table->text('submission_guideline');
            $table->string('submission_email');
            $table->string('logo')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
