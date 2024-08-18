<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskJob extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
    
}
