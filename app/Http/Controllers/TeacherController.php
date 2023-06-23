<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher', ['teacher' => $teacher]);
    }

    public function details($id)
    {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('teacher-details', ['teacher' => $teacher]);
    }
}
