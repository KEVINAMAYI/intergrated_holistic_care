@extends('frontend.layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="styles/about.css">
    <link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
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
                            <div class="home_title">Our Services</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="home.blade.php">Home</a></li>
                                    <li style="color:#d61111" class="bread_crumb_page">Services</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->

    <div class="about">
        <div class="container">
            <div class="row about_row row-lg-eq-height">
                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="about_title"><a style="color:rgb(27, 184, 191);" href="{{ route('student-courses.index') }}">Professional Caregiving Course</a></div>
                        <div class="about_text">
                            <p>Quality, affordable and Intensive training on Patients and Elder Care. Internationally
                                recognised Curriculum.Students internship in a well established and specialised
                                hospitals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_image"><img src="images/main_bg.jpeg" alt="https://unsplash.com/@jtylernix"></div>
                </div>
            </div>
            <div class="row about_row row-lg-eq-height">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about_image"><img src="images/student_training.jpeg" alt=""></div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="about_content">
                        <div class="about_title"><a style="color:rgb(27, 184, 191);" href="{{ route('student-courses.index') }}">First Aid/CPR training</a></div>
                        <div class="about_text">
                            <p>American Heart Association on basic and advanced life support.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row about_row row-lg-eq-height">
                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="about_title"><a style="color:rgb(27, 184, 191);" href="{{ route('student-courses.index') }}">Comprehensive Homecare Services</a></div>
                        <div class="about_text">
                            <p>All age care Nursing Care, wound and stoma care. Physiotherapy, Nutritional services and
                                Ambulance Services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_image"><img src="images/care_giving.jpg" alt="https://unsplash.com/@jtylernix">
                    </div>
                </div>
            </div>
            <div class="row about_row row-lg-eq-height">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about_image"><img src="images/refferals.jpg" alt=""></div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="about_content">
                        <div class="about_title"><a style="color:rgb(27, 184, 191);" href="{{ route('student-courses.index') }}">Local and Oversea Job referrals</a></div>
                        <div class="about_text">
                            <p>To all interested, qualified and able individuals willing to work locally and overseas.
                                .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Milestones -->

    <div class="milestones">
        <!-- Background image artis https://unsplash.com/@thepootphotographer -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/milestones.jpg"
             data-speed="0.8"></div>
        <div class="container">
            <div class="row milestones_container">

                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_1.svg" alt=""></div>
                        <div class="milestone_counter" data-end-value="10">0</div>
                        <div class="milestone_text">Online Courses</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_2.svg" alt=""></div>
                        <div class="milestone_counter" data-end-value="2000">0</div>
                        <div class="milestone_text">Students</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_3.svg" alt=""></div>
                        <div class="milestone_counter" data-end-value="50">0</div>
                        <div class="milestone_text">Instructors</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Teachers -->

    <!-- <div class="teachers">
        <div class="container"> -->
    <!-- <div class="row">
        <div class="col">
            <div class="teachers_title text-center">Meet the Teachers</div>
        </div>
    </div> -->
    <!-- <div class="row teachers_row"> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_1.jpg" alt="https://unsplash.com/@nickkarvounis"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Jonathan Smith</a></div>
                <div class="teacher_subtitle">Marketing</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_2.jpg" alt="https://unsplash.com/@rawpixel"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Michelle Williams</a></div>
                <div class="teacher_subtitle">Art & Design</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_3.jpg" alt="https://unsplash.com/@taylor_grote"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Jack Gallagan</a></div>
                <div class="teacher_subtitle">Marketing</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_4.jpg" alt="https://unsplash.com/@benjaminrobyn"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Christinne Smith</a></div>
                <div class="teacher_subtitle">Marketing</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_5.jpg" alt="https://unsplash.com/@christinhumephoto"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Michelle Williams</a></div>
                <div class="teacher_subtitle">Art & Design</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Teacher -->
    <!-- <div class="col-lg-4 col-md-6">
        <div class="teacher">
            <div class="teacher_image"><img src="images/teacher_6.jpg" alt="https://unsplash.com/@rawpixel"></div>
            <div class="teacher_body text-center">
                <div class="teacher_title"><a href="#">Jack Gallagan</a></div>
                <div class="teacher_subtitle">Marketing</div>
                <div class="teacher_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <!-- </div>
    <div class="row">
        <div class="col text-center">
            <div class="button teachers_button"><a href="#">see all teachers<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
        </div>
    </div> -->
    <!-- </div>
</div> -->

@endsection
