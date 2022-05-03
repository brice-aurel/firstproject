<?php

namespace App\Models;

use App\Models\School;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Support\Str;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getCodeGenerate()
    {
        $code = Str::random(5);
        if(static::whereCode($code)->count() != 0)
        {
            return static::codeGenerate();
        }else 
        {
            return $code;
        }
    }
}
