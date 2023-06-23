@extends('layout.main')
@section('title', 'Student')
    
@section('content')
    <h1>Students List</h1>
    @if (Session::has('status'))
       <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif
    <a href="/student-add" class="btn btn-primary">Add Student</a> <br>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Id card</th>
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
                <td><a href="student/{{$student->id}}">Details</a></td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
@endsection