<?php

namespace App\Models;

use App\Models\School;
use App\Models\Teacher;
use App\Models\Observation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function observation()
    {
        return $this->belongsTo(Observation::class);
    }
}
