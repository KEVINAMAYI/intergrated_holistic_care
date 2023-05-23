<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ URL::to('/') }}">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Elearn project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intergrated Holistic Care</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @stack('styles')
</head>
<body>

<div class="super_container">

    <!-- Header -->
    <header class="header">

        <!-- Top Bar -->
        <div class="top_bar">
            <div class="top_bar_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                <ul class="top_bar_contact_list">
                                    <li>
                                        <div class="question">Have any questions?</div>
                                    </li>
                                    <li>
                                        <div>020 2352211</div>
                                        <div> |</div>
                                        <div>0745234867</div>
                                    </li>
                                    <li>
                                        <div>info@integratedholisticcare.org</div>
                                    </li>
                                </ul>
                                <div class="top_bar_login ml-auto">
                                    <ul>
                                        @guest
                                            @if (Route::has('register'))
                                                <li><a href="/register">Register</a></li>
                                            @endif
                                            @if (Route::has('login'))
                                                <li><a href="/login">Login</a></li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a " id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                   role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="navbarDropdown">
                                                    <a id="logoutbtn" style="color:black; padding-left:10px;" class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_container">
            <div class="container pt-1 pb-2">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo_container pb-3">
                                <a href="#">
                                    <div class="logo_content">
                                        <div class="pt-3 pb-1 pl-3" style="margin-left:-8px; text-align:center;"><img
                                                width="125" height="60" src="images/Intergrated_holistic_care_logo.png"
                                                alt=""></div>
                                        <div class="logo_text pb-1 pl-2 pr-2 text-align-center"
                                             style="color:rgb(27,184,191);">INTEGRATED HOLISTIC
                                        </div>
                                        <div class="logo_text pb-3" style="text-align:center; color:rgb(27,184,191);">
                                            CARE
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <nav class="main_nav_contaner ml-auto">
                                <ul class="main_nav">
                                    <li class="{{ Route::is('home.index') ? 'active' : '' }}"><a
                                            href="{{ route('home.index') }}">home</a></li>
                                    <li class="{{ Route::is('about.index') ? 'active' : '' }}"><a
                                            href="{{ route('about.index') }}">about us</a></li>
                                    <li class="{{ Route::is('services.index') ? 'active' : '' }}"><a
                                            href="{{ route('services.index') }}">services</a></li>
                                    <!-- <li><a href="courses.html">courses</a></li>
                                    <li><a href="news.html">news</a></li> -->
                                    <li class="{{ Route::is('contact.index') ? 'active' : '' }}"><a
                                            href="{{ route('contact.index') }}">contact</a></li>
                                </ul>
                                <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                                <!-- Hamburger -->

                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Search Panel -->
        <div class="header_search_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                            <form action="#" class="header_search_form">
                                <input type="search" class="search_input" placeholder="Search" required="required">
                                <button
                                    class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu -->
    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container">
            <div class="menu_close">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button
                    class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="menu_mm"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="menu_mm"><a href="{{ 'about.index' }}">about us</a></li>
                <!-- <li class="menu_mm"><a href="courses.html">Courses</a></li>
                <li class="menu_mm"><a href="instructors.html">Instructors</a></li>
                <li class="menu_mm"><a href="#">Events</a></li>-->
                <li class=""><a href="{{ route('services.index') }}">services</a></li>
                <li class="menu_mm"><a href="{{ 'contact.index' }}">Contact</a></li>
            </ul>
        </nav>
        <div class="menu_extra">
            <div class="menu_phone"><span class="menu_title">phone:</span>+254-725491638</div>
            <div class="menu_social">
                <span class="menu_title">follow us</span>
                <ul>
                    <!-- <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li> -->
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>