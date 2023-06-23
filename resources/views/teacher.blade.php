@extends('layout.main')
@section('title', 'Teacher')
    
@section('content')
<h1>Teacher List</h1>
<a href="" class="btn btn-primary">Add Teacher</a> <br>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Action</th>

            
        </tr>
    </thead>
    <tbody>
        @foreach ($teacher as $teach)
        
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$teach->name}}</td>
            <td><a href="teacher/{{$teach->id}}">Details</a></td>
            
        </tr>
    @endforeach
    </tbody>
    
</table>
@endsection