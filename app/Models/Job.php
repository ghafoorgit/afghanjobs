<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'education',
        'post_date',
        'closing_date',
        'reference_number',
        'number_of_vacancies',
        'salary_range',
        'years_of_experience',
        'probationary_period',
        'contract_type_id',
        'work_duration_id',
        'gender_id',
        'about_company',
        'job_summary',
        'duties_responsibilities',
        'job_requirements',
        'submission_guideline',
        'submission_email',
        'logo',
    ];

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function workDuration()
    {
        return $this->belongsTo(WorkDuration::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function provinces()
    {
        return $this->belongsToMany(Province::class, 'job_province');
    }

}
