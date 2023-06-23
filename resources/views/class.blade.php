@extends('layout.main')
@section('title', 'Class')
    
@section('content')
<h1>Class List</h1>
<a href="" class="btn btn-primary">Add Class</a> <br>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Class Name</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($classlist as $class)
        
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$class->name}}</td>
            <td><a href="class/{{$class->id}}">Details</a></td>
            
        </tr>
    @endforeach
    </tbody>
    
</table>
@endsection