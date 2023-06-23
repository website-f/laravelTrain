<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index() 
    {
        $ekskul = Extracurricular::get();
        return view('extra', ['extra' => $ekskul]);
    }

    public function details($id)
    {
        $eks = Extracurricular::with('students')->findOrFail($id);
        return view('extra-details', ['extra' => $eks]);
    }
}
