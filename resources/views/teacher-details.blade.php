@extends('layout.main')
@section('title', 'Student')
    
@section('content')

    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <h2>{{$teacher->name}}</h2>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name:</div>
                  <div class="col-lg-9 col-md-8">{{$teacher->name}}</div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Homeroom for Class:</div>
                  <div class="col-lg-9 col-md-8">
                    @if ($teacher->class == null)
                    No class Registered yet
                    @else
                    {{$teacher->class->name}}
                    @endif
                  </div>
                  <br>
                </div>
                <br>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>
        @if ($teacher->class == null)
        @else
        <div class="card recent-sales overflow-auto">  
          <div class="card-body">
            <h5 class="card-title">List of Students</h5>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">Students</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($teacher->class->students as $item)
                  <tr>
                    <th>
                        # <a href="student/{{$item->id}}">{{$item->name}}</a>
                    </th>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @endif


      </div>
    </div>

@endsection