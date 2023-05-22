@extends('layouts.body')

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
                                    <select style="padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-4 form-group">
                                    <label for="gender">Marital Status</label>
                                    <select style="padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                                    <label for="gender">Marital Status</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="gender">Marital Status</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 form-group">
                                    <label for="gender">Marital Status</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="gender">Marital Status</label>
                                    <select style="width:100%; padding:10px;" class="form-select form-select-lg mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="registration_btn"  style="padding:10px; min-width:150px;" type="submit" class="btn btn-primary">
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
