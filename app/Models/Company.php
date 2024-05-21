<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function contactPerson(){
        return $this->belongsTo(User::class,'user_id');
    }
}
