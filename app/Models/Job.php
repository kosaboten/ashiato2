<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function image_url()
    {
        return Storage::url('images/jobs/' . $this->image);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
