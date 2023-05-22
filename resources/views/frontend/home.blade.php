@extends('layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
@endpush

@section('content')

    <!-- Home -->
    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background"
                         style="background-image: url('{{asset('images/main_bg.jpeg')}}');"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_logo"><img src="images/Intergrated_holistic_care_logo.png"
                                                                    alt=""></div>
                                        <div class="home_text">
                                            <div class="home_title">INTEGRATED HOLISTIC</div>
                                            <div class="home_title">CARE</div>

                                            <div class="home_subtitle">compassion with competence.</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background_imgs"
                         style="background-image: url('{{asset('images/main_bg2.JPG')}}')"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_text">
                                            <div class="home_logo"><img src="" alt=""></div>
                                            <div class="home_title">OUR PRIORITY</div>
                                            <div class="home_subtitle">We are commited to giving comprehensive and the
                                                best training to our students and quality care to our customers.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background_imgs"
                         style="background-image:url('{{ asset('images/main_bg3.JPG')}}')"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_logo"><img src="" alt=""></div>
                                        <div class="home_text">
                                            <div class="home_title">WHY CHOOSE US</div>
                                            <div class="home_subtitle">We endeavor to provide quality and affordable
                                                training recognised bt NITA and American Heart Association.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Featured Course -->
    <div class="mt-5 featured">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Home Slider Nav -->
                    <div class="home_slider_nav_container d-flex flex-row align-items-start justify-content-between">
                        <div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left"
                                                                                   aria-hidden="true"></i></div>
                        <div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right"
                                                                                   aria-hidden="true"></i></div>
                    </div>
                    <div class="featured_container">
                        <div class="row">
                            <div class="col-lg-6 featured_col">
                                <div class="featured_content">
                                    <div
                                        class="featured_header d-flex flex-row align-items-center justify-content-start">
                                        <div class="featured_tag"><a href="about.blade.php">READ MORE</a></div>
                                    </div>
                                    <div class="featured_title"><h3><a href="about.blade.php">About Integrated Holistic
                                                Care</a></h3></div>
                                    <div class="featured_text">Integrated Holistic Care Ltd operates under sustainable
                                        developmental goals in Quality and affordable universal education, primary
                                        healthcare provision, and general wellness programs.
                                    </div>
                                    <div class="featured_footer d-flex align-items-center justify-content-start">
                                        <div class="featured_sales ml-auto"><span>2000</span> Students</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 featured_col">
                                <!-- Background image artist https://unsplash.com/@jtylernix -->
                                <div class="featured_background"
                                     style="background-image: url('{{ asset('images/intergrate_healthcare_image.jpg') }}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Milestones -->
    <div class="mt-5 milestones">
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
                        <div class="milestone_text">Teachers</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Sections -->
    <div class="grouped_sections">
        <div class="container">
            <div class="row">

                <!-- Why Choose Us -->

                <div class="col-lg-12 grouped_col">
                    <div class="grouped_title">Why Choose Us?</div>
                    <div class="accordions">

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center">
                                <div>Compassion with Competence</div>
                            </div>
                            <div class="accordion_panel">
                                <div>
                                    <p>We give the best because we value patient care.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center">
                                <div>Experience</div>
                            </div>
                            <div class="accordion_panel">
                                <div>
                                    <p>We have highly experienced nurse who offer theory classes, practicals, role plays
                                        and internships in a well specialised facility. Comprehensive Elderly/patient
                                        Care and Homecare services. 3 months Course with 3 certification.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center">
                                <div>Quality and Affordability</div>
                            </div>
                            <div class="accordion_panel">
                                <div>
                                    <p>We endeavor to provide quality and affordable training recognised bt NITA and
                                        American Heart Association.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center">
                                <div>Flexibility</div>
                            </div>
                            <div class="accordion_panel">
                                <div>
                                    <p>We provide both remote and physical classes which caters for all the needs of our
                                        students.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="video">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video_container_outer">
                        <div class="video_container">
                            <!-- Video poster image artist: https://unsplash.com/@annademy -->
                            <video id="vid1" class="video-js vjs-default-skin" controls
                                   data-setup='{ "poster": "images/video.jpg", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=oXmusPtwi3I"}], "youtube": { "iv_load_policy": 1 } }'>
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


