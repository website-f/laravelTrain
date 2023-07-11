<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function student(Request $request) 
    {   $keyword = $request->keyword;
        $student = Student::with('class')
                            ->where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('card', 'LIKE', '%'.$keyword.'%')
                            ->orWhereHas('class', function($query) use($keyword){
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })
                            ->paginate(5);
        return view('student', ['students' => $student]);
    }

    public function details($id)
    {
        $student = Student::with(['class.teacher', 'extracurriculars'])->findOrFail($id);
        $class = Classroom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-details', ['student' => $student, 'class' => $class]);
    }

    public function create()
    {
        $class = Classroom::select('id', 'name')->get();
        return view('add-student', ['class' => $class]);
    }

    public function insert(StudentCreateRequest $request)
    {
        //$student = new Student;
        //$student->name = $request->name;
        //$student->gender = $request->gender;
        //$student->card = $request->card;
        //$student->class_id = $request->class;
        //$student->save();

        $student = Student::create($request->all());

        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'New Student Added!');
        }

        return redirect('student');

    }

    public function edit(Request $request, $id)
    {
       $student = Student::findOrFail($id);

       //$student->name = $request->name;
       //$student->gender = $request->gender;
       //$student->card = $request->card;
       //$student->class_id = $request->class_id;
       //$student->save();

       $student->update($request->all()); 

       return redirect('student/' . $student->id);
    }

    public function del($id) 
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function delete($id)
    {
        //$student = DB::table('students')->where('id', $id);
        $student = Student::findOrFail($id);
        $student->delete();

        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully remove student');
        }
        return redirect('student');

    }
    public function deleted() {
        $student = Student::onlyTrashed()->get();
        return view('deleted', ['students' => $student]);
    }

    public function restore($id) {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        if($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully restore student');
        }
        return redirect('student');
    }
}
