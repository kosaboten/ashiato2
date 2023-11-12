<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function company(){
        $this->belongsTo(Company::class);
    }

    public function portfolio() {
        $this->belongsTo(Portfolio::class);
    }
}
