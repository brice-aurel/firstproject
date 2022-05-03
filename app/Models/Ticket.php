<?php

namespace App\Models;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];
    public $timestamps = false;

    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }

}
