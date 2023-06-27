<?php

namespace App\Models;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    public function class() 
    {
        return $this->belongsTo(ClassRoom::class);
    }

    
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }

    protected $fillable = [
        'name',
        'gender',
        'card',
        'class_id',
    ];
}
