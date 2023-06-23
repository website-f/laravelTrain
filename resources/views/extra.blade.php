@extends('layout.main')
@section('title', 'Extracurricular')
    
@section('content')
<h1>Extracurricular</h1>
<a href="" class="btn btn-primary">Add extracurricular</a> <br>
<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Extracurricular</th>
            <th>Action</th>


            
        </tr>
    </thead>
    <tbody>
        @foreach ($extra as $ex)
        
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ex->name}}</td>
            <td><a href="extracurricular/{{$ex->id}}">Details</a></td>
            
        </tr>
    @endforeach
    </tbody>
    
</table>
@endsection