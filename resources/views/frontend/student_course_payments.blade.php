@extends('frontend.layouts.body')

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
                            <div class="home_title">Enroll</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="home.blade.php">Home</a></li>
                                    <li style="color:#d61111" class="bread_crumb_page">Enroll</li>
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

            @if (session()->has('error'))
                <div class="alert ml-2 mr-2 mt-3 alert-success">
                    {{ session('error') }}
                </div>
            @endif

            <div style="margin-top:70px; margin-bottom:70px;" class="row row-xl-eq-height">
                <!-- Contact Content -->
                <div class="col-xl-5 ml-4">
                    <img class="ml-4" src="images/mpesa_logo.png" alt="">
                </div>

                <div class="mt-4  col-xl-5 map_col">
                    <h4 class="mb-3 ml-4" style="font-weight:bold;">COURSE PAYMENT</h4>
                    <ul class="ml-4">
                        <li > Go to your M-PESA account.</li>
                        <li class="">Go to LIPA NA M-PESA</li>
                        <li class="">Choose Pay Bill</li>
                        <li class="">Choose Enter business no and Enter : 880100</li>
                        <li class="">Click OK then enter account number as 5683140014</li>
                        <li class="">Enter Course Amoun e.g 5000</li>
                        <li class="">Enter Your Pin then Send.</li>
                    </ul>
                    <a href="{{route('confirm-course-payment',[$courseId])}}" class="ml-4 mt-4 btn btn-md btn-success">Confirm Payment</a>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(function (){
                setTimeout(function () {
                    $('.alert').alert('close');
                }, 3000);
            });
        </script>
    @endpush

@endsection
