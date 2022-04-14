<?php

namespace App\Models;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

}
