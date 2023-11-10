<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'region',
        'access',
        'job_description',
        'employment_status',
        'eligibility',
        'pay',
        'address',
        'contact',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
