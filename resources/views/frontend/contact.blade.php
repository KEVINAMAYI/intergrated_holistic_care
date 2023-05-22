@extends('layouts.body')

@push('styles')
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
@endpush

@section('content')

    <!-- Home -->
    <div class="home">
        <!-- Background image artist https://unsplash.com/@thepootphotographer -->
        <div class="home_background parallax_background parallax-window" data-parallax="scroll"
             data-image-src="images/contact.jpg" data-speed="0.8"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="home_title">Contact</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="home.blade.php">Home</a></li>
                                    <li style="color:#d61111" class="bread_crumb_page">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container-fluid">
            <div class="row row-xl-eq-height">
                <!-- Contact Content -->
                <div class="col-xl-6">
                    <div class="contact_content">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact_about">
                                    <div class="logo_container" style="text-align:center;">
                                        <a href="#">
                                            <div class="logo_content pb-5 pt-4">
                                                <div class="logo_img"><img width="150" height="80"
                                                                           src="images/Intergrated_holistic_care_logo.png"
                                                                           alt=""></div>
                                                <div class="logo_text pb-3 mt-2 text-align-center"
                                                     style="line-height:19px; color:rgb(27,184,191);">INTEGRATED
                                                    HOLISTIC CARE
                                                </div>
                                                <p>compassion with competence
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="contact_about_text">
                                        <p>
                                            Get in touch now and access affordable, quality healthcare education
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact_info_container">
                                    <div class="contact_info_main_title">Contact Us</div>
                                    <div class="contact_info">
                                        <div class="contact_info_item">
                                            <div class="contact_info_title">Address:</div>
                                            <div class="contact_info_line">P.o box 37129-00100
                                                Emperor Plaza Koinange Streets 4th Floor, suits 422/426
                                            </div>
                                        </div>
                                        <div class="contact_info_item">
                                            <div class="contact_info_title">Phone:</div>
                                            <div class="contact_info_line">020 2352211
                                                |
                                                0745234867
                                            </div>
                                        </div>
                                        <div class="contact_info_item">
                                            <div class="contact_info_title">Email:</div>
                                            <div class="contact_info_line">info@integratedholisticcare.org</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer_social">
                            <ul>
                                <li><a href="https://wa.me/message/L53K65VGCECJD1"><i
                                            style="color:rgb(27,184,191); font-size:30px;" class="fa fa-whatsapp"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://www.facebook.com/IntegratedHolisticCaregivers?mibextid=ZbWKwL"><i
                                            style="color:rgb(27,184,191); font-size:30px;" class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/integrated-holistic-care/"><i
                                            style="color:rgb(27,184,191); font-size:30px;" class="fa fa-linkedin"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://instagram.com/integratedholistic.care?igshid=ZGUzMzM3NWJiOQ=="><i
                                            style="color:rgb(27,184,191); font-size:30px;" class="fa fa-instagram"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <!-- <div class="contact_form_container">
                            <form action="#" id="contact_form" class="contact_form">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6 contact_name_col">
                                            <input type="text" class="contact_input" placeholder="Name" required="required">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" class="contact_input" placeholder="E-mail" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div><input type="text" class="contact_input" placeholder="Subject" required="required"></div>
                                <div><textarea class="contact_input contact_textarea" placeholder="Message"></textarea></div>
                                <button class="contact_button"><span>send message</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                            </form>
                        </div> -->
                    </div>
                </div>

                <!-- Contact Map -->
                <div class="mt-4 col-xl-6 map_col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.629121991645!2d36.810244277709955!3d-1.2852421999999948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d12eb050cd%3A0xcc7132a6b74cddcf!2sEmperor%20Plaza!5e0!3m2!1sen!2ske!4v1684228182974!5m2!1sen!2ske"
                        width="600vw" height="450vw" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>

@endsection
