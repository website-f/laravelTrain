@extends('layout.main')
@section('title', 'Student')
    
@section('content')
    <h1>Deleted Students List</h1>
    <a class="btn btn-primary" href="/student">Back</a>
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
                <td><a class="btn btn-primary btn-sm" href="/student/{{$student->id}}/restore">Restore</a>
                    <a class="btn btn-danger btn-sm" href="#">Delete Permanently</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
@endsection