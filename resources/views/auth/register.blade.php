@extends('frontend.layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/loader.css">
@endpush

@section('content')
    <div class="container auth_container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body" style="position: relative;">
                        <div class="loader" style="display:none">Loading...</div>

                        <form id="registrationForm" method="POST" action="{{ route('register') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-lg-4 col-sm-12 form-group">
                                    <label for="name">Name <span style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="text" class="form-control "
                                           id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name"
                                           required autocomplete="name" autofocus>

                                </div>

                                <div class="col-lg-4 col-sm-12  form-group">
                                    <label for="email">Email<span style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="email" class="form-control"
                                           id="email" name="email" value="{{ old('email') }}"
                                           aria-describedby="emailHelp" placeholder="Enter Email" required
                                           autocomplete="email" autofocus>

                                </div>

                                <div class="col-lg-4 col-sm-12  form-group">
                                    <label for="phone_number">Phone<span style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="text" class="form-control"
                                           id="phone_number" value="{{ old('phone_number') }}" name="phone_number"
                                           placeholder="Enter Phone" required autocomplete="phone_number" autofocus>

                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-4 col-sm-12  form-group">
                                    <label for="dob">Date of Birth<span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="date" class="form-control"
                                           id="dob" name="dob" value="{{ old('dob') }}"
                                           required autocomplete="name" autofocus>

                                </div>

                                <div class="col-lg-4 col-sm-12  form-group">
                                    <label for="gender">Gender<span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="padding:10px; width:100%" class="form-select form-select-lg mb-3"
                                            id="gender_id" name="gender_id" aria-label="Default select example">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-sm-12  form-group">
                                    <label for="marital_status_id">Marital Status<span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="padding:10px; width:100%" id="marital_status_id"
                                            name="marital_status_id" class="form-select form-select-lg mb-3"
                                            aria-label="Default select example">
                                        @foreach($marital_statuses as $marital_status)
                                            <option
                                                value="{{ $marital_status->id }}">{{ $marital_status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="identification_number">National ID/Passport Number<span
                                            style="color:red; font-weight:bold;"> *</span></label></label>
                                    <input type="text"
                                           class="form-control"
                                           id="identification_number" name="identification_number"
                                           value="{{ old('identification_number') }}" placeholder="Enter National ID"
                                           autocomplete="name" autofocus>

                                </div>
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="location">Location <span style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="text" class="form-control"
                                           id="location" value="{{ old('location') }}" name="location"
                                           placeholder="Enter Location" required autocomplete="location" autofocus>

                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="gender">Highest Education Level <span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="width:100%; padding:10px;" id="education_level_id"
                                            name="education_level_id" class="form-select form-select-lg mb-3"
                                            aria-label="Default select example">
                                        @foreach($education_levels as $education_level)
                                            <option
                                                value="{{ $education_level->id }}">{{ $education_level->level }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="course_id">Preferred Course <span style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3"
                                            id="course_id" name="course_id" aria-label="Default select example">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="gender">Preferred Time of Class <span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3"
                                            id="preferred_time_of_class_id" name="preferred_time_of_class_id"
                                            aria-label="Default select example">
                                        @foreach($preferred_times as $preferred_time)
                                            <option
                                                value="{{ $preferred_time->id }}">{{ $preferred_time->time }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="how_you_learnt_about_us_id">How You Learn About Us <span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <select style="width:100%; padding:10px;" name="how_you_learnt_about_us_id"
                                            id="how_you_learnt_about_us_id" class="form-select form-select-lg mb-3"
                                            aria-label="Default select example">
                                        @foreach($methods as $method)
                                            <option value="{{ $method->id }}">{{ $method->how }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="password">Password<span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="password" class="form-control"
                                           id="password" value="{{ old('password') }}" name="password"
                                           placeholder="Enter Password" required autofocus>
                                </div>

                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="password_confirmation">Confirm Password<span
                                            style="color:red; font-weight:bold;"> *</span></label>
                                    <input type="password"
                                           class="form-control"
                                           id="password_confirmation" value="{{ old('password_confirmation') }}"
                                           name="password_confirmation"
                                           placeholder="Confirm Password" required autofocus>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="birth_certificate" class="form-label">Birth Certificate<span
                                            style="color:red; font-weight:bold;"> *</span></label></label>
                                    <input class="form-control" type="file" name="birth_certificate"
                                           id="birth_certificate"
                                           required>
                                </div>
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="school_certificate" class="form-label">KCSE/Diploma Certificate<span
                                            style="color:red; font-weight:bold;"> *</span></label></label>
                                    <input class="form-control" type="file" name="school_certificate"
                                           id="school_certificate"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="identification_file" class="form-label">Naional ID/Passport<span
                                            style="color:red; font-weight:bold;"> *</span></label></label>
                                    <input class="form-control" type="file" name="identification_file"
                                           id="identification_file"
                                           required>
                                </div>

                                <div class="col-lg-6 col-sm-12  form-group">
                                    <label for="student_photo" class="form-label">Photo<span
                                            style="color:red; font-weight:bold;"> *</span></label></label>
                                    <input class="form-control" type="file" name="student_photo" id="student_photo"
                                           required>
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 col-sm-12  offset-md-4">
                                    <button class="auth_buttons" style="padding:10px; min-width:150px;" type="submit"
                                            class="btn btn-primary">
                                        {{ __('REGISTER') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\StoreUserRequest', '#registrationForm'); !!}

        <script>
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#registrationForm').ajaxForm({
                    beforeSend: function () {
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        $('.loader').css("display", "");
                        window.scrollTo(80, 80);
                    },
                    complete: function (response) {
                        location.href = "/login";
                    }

                });

            });
        </script>
    @endpush
@endsection
