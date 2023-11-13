<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliation',
        'self_introduction',
        'work_experience',
        'region',
        'twitter',
        'facebook',
        'instagram',
        'public_status',
    ];

        public function image_url()
    {
        return Storage::url('images/portfolios/' . $this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        $this->hasMany(Skill::class);
    }

    public function offers()
    {
        $this->hasMany(Skill::class);
    }

    public function works()
    {
        $this->hasMany(Work::class);
    }
}
