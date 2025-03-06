<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contractTypeId = DB::table('contract_types')->where('name', 'Permanent')->first()->id ?? null;
        $workDurationId = DB::table('work_durations')->where('name', 'Full Time')->first()->id ?? null;
        $genderId = DB::table('genders')->where('name', 'Male')->first()->id ?? null;

        // Ensure required data exists
        if (!$contractTypeId || !$workDurationId || !$genderId) {
            return;
        }

        // Insert sample jobs
        for($i = 0; $i<25; $i++){
            DB::table('jobs')->insert([
                [
                    'job_title' => 'Software Engineer',
                    'company_name' => 'Tech Solutions Ltd.',
                    'job_location' => 'Kabul, Afghanistan',
                    'education' => 'Bachelor’s in Computer Science',
                    'post_date' => Carbon::now()->subDays(5),
                    'closing_date' => Carbon::now()->addDays(30),
                    'reference_number' => Str::random(10),
                    'number_of_vacancies' => 2,
                    'salary_range' => '$1000 - $1500',
                    'years_of_experience' => '3+ years',
                    'probationary_period' => '3 months',
                    'contract_type_id' => $contractTypeId,
                    'work_duration_id' => $workDurationId,
                    'gender_id' => $genderId,
                    'about_company' => 'Tech Solutions Ltd. is a leading IT firm in Afghanistan.',
                    'job_summary' => 'Develop and maintain software applications.',
                    'duties_responsibilities' => 'Write clean and efficient code, work in agile teams.',
                    'job_requirements' => 'Strong knowledge of PHP, Laravel, and JavaScript.',
                    'submission_guideline' => 'Send your resume to the email below.',
                    'submission_email' => 'jobs@techsolutions.af',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'job_title' => 'Marketing Specialist',
                    'company_name' => 'Afghan Business Group',
                    'job_location' => 'Herat, Afghanistan',
                    'education' => 'Bachelor’s in Marketing or Business Administration',
                    'post_date' => Carbon::now()->subDays(2),
                    'closing_date' => Carbon::now()->addDays(20),
                    'reference_number' => Str::random(10),
                    'number_of_vacancies' => 1,
                    'salary_range' => '$800 - $1200',
                    'years_of_experience' => '2+ years',
                    'probationary_period' => '2 months',
                    'contract_type_id' => $contractTypeId,
                    'work_duration_id' => $workDurationId,
                    'gender_id' => $genderId,
                    'about_company' => 'Afghan Business Group specializes in FMCG distribution.',
                    'job_summary' => 'Plan and execute marketing strategies.',
                    'duties_responsibilities' => 'Manage social media, coordinate marketing campaigns.',
                    'job_requirements' => 'Experience in digital marketing and SEO.',
                    'submission_guideline' => 'Send your resume to the email below.',
                    'submission_email' => 'hr@afghanbusiness.af',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }

    }
}
