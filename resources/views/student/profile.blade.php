@extends('student.layouts.body',['page_title' => 'Profile'])

@push('styles')
    <link rel="stylesheet" href="styles/student_profile.css">
    <link rel="stylesheet" href="styles/custom.css">
@endpush

@section('content')
    <div class="container-fluid pt-1">

        @if (session()->has('message'))
            <div  class="alert mt-5 alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                        class="rounded-circle mt-5" width="150px"
                                        src="{{ asset('images/student_photos/'.$student->student_photo) }}"><span
                                        class="font-weight-bold">{{ $student->name }}</span><span
                                        class="text-black-50">{{ $student->phone_number }}</span><span
                                        class="text-black-50">{{ $student->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <form id="UpdateStudentProfileForm"
                                      action="{{ route('student-profile.update',auth()->user()->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6"><label class="labels">Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="Name"
                                                       name="name"
                                                       value="{{ $student->name }}"></div>
                                            <div class="col-md-6"><label class="labels">Email</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="email"
                                                       value="{{ $student->email }}"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6"><label class="labels">Date of Birth</label><input
                                                    type="date" class="form-control"
                                                    id="dob" name="dob" value="{{ $student->dob }}"
                                                    required autocomplete="name" autofocus></div>
                                            <div class="col-md-6"><label class="labels">Gender</label><select
                                                    style="padding:10px; width:100%"
                                                    class="form-select form-select-lg mb-3"
                                                    id="gender_id" name="gender_id" aria-label="Default select example">
                                                    @foreach($genders as $gender)
                                                        @if($student->gender->gender == $gender->gender)
                                                            <option selected
                                                                    value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                                        @else
                                                            <option
                                                                value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                                        @endif
                                                    @endforeach
                                                </select></div>
                                            <div class="col-md-6"><label class="labels">Marital Status</label><select
                                                    style="padding:10px; width:100%" id="marital_status_id"
                                                    name="marital_status_id" class="form-select form-select-lg mb-3"
                                                    aria-label="Default select example">
                                                    @foreach($marital_statuses as $marital_status)
                                                        <option
                                                            value="{{ $marital_status->id }}">{{ $marital_status->status }}</option>
                                                    @endforeach
                                                </select></div>
                                            <div class="col-md-6"><label class="labels">National ID/Passport</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="identification_number" name="identification_number"
                                                    value="{{ $student->identification_number }}"
                                                    placeholder="Enter National ID"
                                                    autocomplete="name" autofocus>
                                            </div>
                                            <div class="col-md-6"><label class="labels">Location</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="location"
                                                       value="{{ $student->location }}"
                                                       name="location"
                                                       placeholder="Enter Location"
                                                       required
                                                       autocomplete="location"
                                                       autofocus>
                                            </div>
                                            <div class="col-md-6"><label class="labels">Education Level</label> <select
                                                    style="width:100%; padding:10px;" id="education_level_id"
                                                    name="education_level_id" class="form-select form-select-lg mb-3"
                                                    aria-label="Default select example">
                                                    @foreach($education_levels as $education_level)
                                                        @if($student->education_level->level == $education_level->level)
                                                            <option selected
                                                                    value="{{ $education_level->id }}">{{ $education_level->level }}</option>
                                                        @else
                                                            <option
                                                                value="{{ $education_level->id }}">{{ $education_level->level }}</option>
                                                        @endif
                                                    @endforeach
                                                </select></div>
                                            <div class="col-md-6"><label class="labels">Preferred Time of Class</label>
                                                <select style="width:100%; padding:10px;"
                                                        class="form-select form-select-lg mb-3"
                                                        id="preferred_time_of_class_id"
                                                        name="preferred_time_of_class_id"
                                                        aria-label="Default select example">
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6"><label class="labels">Birth Certificate</label>
                                                <input class="form-control" type="file" name="birth_certificate"
                                                       id="birth_certificate"
                                                >
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6"><label class="labels">KCSE/Diploma Certificate</label>
                                                <input class="form-control" type="file" name="school_certificate"
                                                       id="school_certificate"
                                                >
                                            </div>
                                            <div class="col-md-6"><label class="labels">National ID/Passport</label>
                                                <input class="form-control" type="file" name="identification_file"
                                                       id="identification_file"
                                                ></div>
                                            <div class="col-md-6 mt-4"><label class="labels">Photo</label>
                                                <input class="form-control" type="file" name="student_photo"
                                                       id="student_photo"
                                                >
                                            </div>

                                        </div>
                                        <div class="mt-5 row text-center">
                                            <button class="col-3 btn btn-primary profile-button" type="submit">Save
                                                Profile
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\UpdateStudentProfileRequest', '#UpdateStudentProfileForm'); !!}

        <script>
            $(function (){
                setTimeout(function () {
                    $('.alert').alert('close');
                }, 3000);
            });
        </script>
    @endpush
@endsection
