<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

        protected $fillable = [
        'portfolio_id',
        'title',
        'language',
        'roll',
        'app_url',
        'github_url',
        'body',
        'public_status',
    ];

    public function portfolio()
    {
        $this->belongsTo(Portfolio::class);
    }
}
