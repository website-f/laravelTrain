<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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

    public function details($slug)
    {
        $student = Student::with(['class.teacher', 'extracurriculars'])->where('slug', $slug)->first();
        $class = Classroom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        $ext = Extracurricular::all();
        return view('student-details', ['student' => $student, 'class' => $class, 'extracurriculars' => $ext]);
    }

    public function create()
    {
        $class = Classroom::select('id', 'name')->get();
        return view('add-student', ['class' => $class,]);
    }

    public function insert(StudentCreateRequest $request)
    {
        //$student = new Student;
        //$student->name = $request->name;
        //$student->gender = $request->gender;
        //$student->card = $request->card;
        //$student->class_id = $request->class;
        //$student->save();

        $newName = '';

        if($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);


        }
        
        
        //$request['image'] = $newName;
        //$student = Student::create($request->all());

        $student = new Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->card = $request->card;
        $student->class_id = $request->class_id;
        $student->image = $newName;
        $student->save();

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

       $newName = '';
        
        

        if($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
            Storage::delete('/photo/'.$student->image); 
        }
        
        if($newName != '') {
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->card = $request->card;
            $student->class_id = $request->class_id;
            $student->image = $newName;
            $student->extracurriculars()->sync($request->input('extracurriculars'));
            $student->save();
        } else {
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->card = $request->card;
            $student->class_id = $request->class_id;
            $student->extracurriculars()->sync($request->input('extracurriculars'));
            $student->save();
        }
             
        
        

        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Student Edited!');
        }

       return redirect('student/' . $student->slug);
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


    public function massUpdate() {
        $student = Student::all();
        collect($student)->map(function($item){
            $item->slug = Str::slug($item->name, '_');
            $item->save();
        });
    }
    
}
