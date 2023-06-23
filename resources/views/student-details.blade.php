@extends('layout.main')
@section('title', 'Student')
    
@section('content')

    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <h2>{{$student->name}}</h2>
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
                  <div class="col-lg-9 col-md-8">{{$student->name}}</div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender:</div>
                  <div class="col-lg-9 col-md-8">
                    @if ($student->gender == 'P')
                    Perempuan
                    @else 
                    Lelaki
                    @endif
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">ID Card:</div>
                  <div class="col-lg-9 col-md-8">{{$student->card}}</div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Class:</div>
                  <div class="col-lg-9 col-md-8">{{$student->class->name}}</div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Extracurricular:</div>
                  <div class="col-lg-9 col-md-8">
                    @foreach ($student->extracurriculars as $item)
                        - {{$item->name}} <br>
                    @endforeach
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Homeroom Teacher:</div>
                  <div class="col-lg-9 col-md-8">{{$student->class->teacher->name}}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="student-edit/{{$student->id}}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{$student->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="gender" id="gender" class="form-select" aria-label="Default select example" required>
                      <option value="{{$student->gender}}">{{$student->gender}}</option>
                      @if ($student->gender == 'L')
                          <option value="P">P</option>
                      @else
                          <option value="P">L</option>
                      @endif
                    </select>
                  </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Card</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="card" type="text" class="form-control" id="card" value="{{$student->card}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="class_id" id="class_id" class="form-select" aria-label="Default select example" required>
                      <option value="{{$student->class->id}}">{{$student->class->name}}</option>
                      @foreach ($class as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>

@endsection