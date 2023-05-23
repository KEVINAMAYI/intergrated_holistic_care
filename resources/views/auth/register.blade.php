@extends('frontend.layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
@endpush

@section('content')
    <div class="container auth_container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-4 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name"
                                           required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}"
                                           aria-describedby="emailHelp" placeholder="Enter Email" required
                                           autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="phone_number">Phone</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                           id="phone_number" value="{{ old('phone_number') }}" name="phone_number"
                                           placeholder="Enter Phone" required autocomplete="phone_number" autofocus>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-4 form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                           id="dob" name="dob" value="{{ old('dob') }}"
                                           required autocomplete="name" autofocus>
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="gender">Gender</label>
                                    <select style="padding:10px; width:100%" class="form-select form-select-lg mb-3" id="gender_id" name="gender_id" aria-label="Default select example">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 form-group">
                                    <label for="marital_status_id">Marital Status</label>
                                    <select style="padding:10px; width:100%" id="marital_status_id" name="marital_status_id" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        @foreach($marital_statuses as $marital_status)
                                            <option value="{{ $marital_status->id }}">{{ $marital_status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-4 form-group">
                                    <label for="national_id">National ID</label>
                                    <input type="text" class="form-control @error('national_id') is-invalid @enderror"
                                           id="national_id" name="national_id" value="{{ old('national_id') }}" placeholder="Enter National ID"
                                           required autocomplete="name" autofocus>
                                    @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="passport">Passport</label>
                                    <input type="text" class="form-control @error('passport') is-invalid @enderror"
                                           id="passport" name="passport" value="{{ old('passport') }}"
                                           aria-describedby="emailHelp" placeholder="Enter Passport" required
                                           autocomplete="passport" autofocus>
                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                           id="location" value="{{ old('location') }}" name="location"
                                           placeholder="Enter Location" required autocomplete="location" autofocus>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 form-group">
                                    <label for="gender">Highest Education Level</label>
                                    <select style="width:100%; padding:10px;" id="education_level_id" name="education_level_id" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        @foreach($education_levels as $education_level)
                                            <option value="{{ $education_level->id }}">{{ $education_level->level }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="course_id">Preferred Course</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3"  id="course_id" name="course_id" aria-label="Default select example">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 form-group">
                                    <label for="gender">Preferred Time of Class</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3" id="preferred_time_of_class_id" name="preferred_time_of_class_id" aria-label="Default select example">
                                        @foreach($preferred_times as $preferred_time)
                                            <option value="{{ $preferred_time->id }}">{{ $preferred_time->time }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="how_you_learnt_about_us_id">How You Learn About Us</label>
                                    <select style="width:100%; padding:10px;" name="how_you_learnt_about_us_id" id="how_you_learnt_about_us_id" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        @foreach($methods as $method)
                                            <option value="{{ $method->id }}">{{ $method->how }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-6 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" value="{{ old('password') }}" name="password"
                                           placeholder="Enter Password" required autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-6 form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation"
                                           placeholder="Confirm Password" required  autofocus>
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="auth_buttons" style="padding:10px; min-width:150px;" type="submit" class="btn btn-primary">
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
@endsection
