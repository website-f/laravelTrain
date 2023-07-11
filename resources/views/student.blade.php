@extends('layout.main')
@section('title', 'Student')
    
@section('content')
    <h1>Students List</h1>
    @if (Session::has('status'))
       <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif
    <div class="my-5 d-flex justify-content-between">
        <a href="/student-add" class="btn btn-primary">Add Student</a> 
        <a href="/student-deleted " class="btn btn-info">Show Deleted Students</a>
    </div>
     <br>
    <div class="mb-3">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="keyword">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Id card</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->name}}</td>
                <td> {{$student->gender}}</td>
                <td> {{$student->card}}</td>
                <td> {{$student->class->name}}</td>
                <td><a href="student/{{$student->id}}">Details</a></td>
            </tr>
        @endforeach
        </tbody>   
    </table>

    {{$students->withQueryString()->links()}}
@endsection