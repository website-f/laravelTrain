@extends('layout.main')
@section('title', 'Student')
    
@section('content')
<div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
      <h2>Confirm to remove {{$student->name}} from the student lists ?</h2>
      <form method="POST" action="/student-delete/{{$student->id}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
      <form>
      <a href="/student/{{$student->id}}" class="btn btn-primary btn-sm">Back</a>
    </div>
    
  </div>
@endsection