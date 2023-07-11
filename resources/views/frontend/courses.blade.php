@extends('frontend.layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
@endpush

@section('content')

    <!-- Home -->
    <div class="home">
        <!-- Background image artist https://unsplash.com/@thepootphotographer -->
        <div class="home_background parallax_background parallax-window" data-parallax="scroll"
             data-image-src="images/about.jpg" data-speed="0.8"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="home_title">Our Courses</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="home.blade.php">Home</a></li>
                                    <li style="color:#d61111" class="bread_crumb_page">Courses</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="courses">
        <div class="container">
            <div class="row courses_row">
                @if(!empty($student_courses_ids))
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="course">
                                <div class="course_image"><img src="images/course_images/{{ $course->image_url }}"
                                                               alt=""></div>
                                <div class="course_body">
                                    @if(in_array($course->id,$student_courses_ids))
                                        <div
                                            class="course_header d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_tag"><a style="background-color:rgb(27, 184, 191)"
                                                                       href="{{ route('take-lessons',$course->id) }}">Continue</a>
                                            </div>
                                        </div>
                                        <div class="course_title"><h3><a
                                                    href="{{ route('take-lessons',$course->id) }}">{{ $course->title }}</a>
                                            </h3>
                                        </div>
                                    @else
                                        <div
                                            class="course_header d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_tag"><a style="background-color:#db5246;"
                                                                       href="{{ route('make-course-payment',$course->id) }}">Enroll</a>
                                            </div>
                                        </div>
                                        <div class="course_title"><h3><a
                                                    href="">{{ $course->title }}</a>
                                            </h3>
                                        </div>
                                    @endif
                                    <div class="course_text">{{ $course->description }}</div>
                                    <div class="course_footer d-flex align-items-center justify-content-start">
                                        <div class="course_author_name">By <a href="#">Lilian Owiti</a></div>
                                        <div class="course_sales ml-auto"><span>1000</span> Students</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="course">
                                <div class="course_image"><img src="images/course_images/{{ $course->image_url }}"
                                                               alt=""></div>
                                <div class="course_body">
                                    <div
                                        class="course_header d-flex flex-row align-items-center justify-content-start">
                                        <div class="course_tag"><a style="	background-color: #db5246;"
                                                                   href="{{ route('make-course-payment',$course->id) }}">Enroll</a>
                                        </div>
                                    </div>
                                    <div class="course_title"><h3><a
                                                href="">{{ $course->title }}</a>
                                        </h3>
                                    </div>
                                    <div class="course_text">{{ $course->description }}</div>
                                    <div class="course_footer d-flex align-items-center justify-content-start">
                                        <div class="course_author_name">By <a href="#">Lilian Owiti</a></div>
                                        <div class="course_sales ml-auto"><span>1000</span> Students</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <!-- Pagination -->
            {{--            <div class="row">--}}
            {{--                <div class="col">--}}
            {{--                    <div class="courses_paginations">--}}
            {{--                        <ul>--}}
            {{--                            <li class="active"><a href="#">01</a></li>--}}
            {{--                            <li><a href="#">02</a></li>--}}
            {{--                            <li><a href="#">03</a></li>--}}
            {{--                            <li><a href="#">04</a></li>--}}
            {{--                            <li><a href="#">05</a></li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>

@endsection
