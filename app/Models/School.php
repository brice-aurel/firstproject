<?php

namespace App\Models;

use App\Models\Toast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;
}
