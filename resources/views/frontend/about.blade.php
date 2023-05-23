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
                            <div class="home_title">About us</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="home.blade.php">Home</a></li>
                                    <li style="color:#d61111" class="bread_crumb_page">About us</li>
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
                        <div class="about_title">What We Do</div>
                        <div class="about_text">
                            <p>Integrated Holistic Care Ltd operates under sustainable developmental goals in Quality
                                and affordable universal education, primary healthcare provision, and general wellness
                                programs. <br><br>
                                Integrated Holistic Care focuses on providing quality education to professional
                                caregiving/Certified nurse assistants, First Aid and CPR, Basic Life Support, Autism,
                                and a certificate in Physiotherapy.<br><br>
                                We focus on training individuals from all socioeconomic strata and Equipping them with
                                standard knowledge of basic technical skills in nursing education, that's
                                internationally recognized exposing them to the job market globally.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_image"><img src="images/intergrate_healthcare_image.jpg"
                                                  alt="https://unsplash.com/@jtylernix"></div>
                </div>
            </div>
            <div class="row about_row row-lg-eq-height">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about_image"><img src="images/intergrate_healthcare_vision.jpg" alt=""></div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="about_content">
                        <div class="icon_box">
                            <div class="ib_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="ib_image"><img width="50" height="50" src="images/priority.png" alt="">
                                </div>
                                <div class="ib_title ml-2" style="font-weight:bold; font-size:18px;">OUR PRIORITY</div>
                            </div>
                            <div class="ib_text">
                                <p>We are commited to giving comprehensive and the best training to our students and
                                    quality care to our customers.</p>
                            </div>
                        </div>

                        <div class="icon_box mt-4">
                            <div class="ib_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="ib_image"><img width="50" height="50" src="images/our_values.png" alt="">
                                </div>
                                <div class="ib_title ml-2" style="font-weight:bold; font-size:18px;">OUR VALUES</div>
                            </div>
                            <div class="ib_text">
                                <ul class=" mt-3 list-group">
                                    <li class="list-group-item"><b>Professionalism and Ethics</b></li>
                                    <li class="list-group-item"><b>Tender, Love and Care</b></li>
                                    <li class="list-group-item"><b>Empathy and Good Communication Skills</b></li>
                                    <li class="list-group-item"><b>Competence and Commitmemnts.</b></li>
                                </ul>
                            </div>
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
                        <div class="milestone_counter" data-end-value="5">0</div>
                        <div class="milestone_text">Instructors</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

