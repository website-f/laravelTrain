<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function class()
    {
        $class = Classroom::get();
        return view('class', ['classlist' => $class]);
    }

    public function details($id)
    {
        $class = Classroom::with(['students', 'teacher'])->findOrFail($id);
        return view('class-details', ['class' => $class]);
    }
}
