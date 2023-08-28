@extends('layout.main')
@section('title', 'Extracurricular')
    
@section('content')
<h1>Extracurricular | {{$extra->name}}</h1>
<!-- Recent Sales -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Filter</h6>
          </li>

          <li><a class="dropdown-item" href="#">Today</a></li>
          <li><a class="dropdown-item" href="#">This Month</a></li>
          <li><a class="dropdown-item" href="#">This Year</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Students for <span>| {{$extra->name}}</span></h5>

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">Students</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($extra->students as $item)
              <tr>
                <th>
                    # <a href="/student/{{$item->slug}}">{{$item->name}}</a>
                </th>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>
</div><!-- End Recent Sales -->
@endsection