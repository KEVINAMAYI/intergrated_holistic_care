<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-lg-3 footer_col">
                <div class="footer_about" style="text-align:center;">
                    <div class="logo_content">
                        <div class="pt-3 pb-1 pl-3" style="margin-left:-8px; text-align:center;"><img width="125" height="60" src="images/Intergrated_holistic_care_logo.png" alt=""></div>
                        <div class="logo_text pb-1 pl-2 pr-2 text-align-center" style="color:rgb(27,184,191);">INTEGRATED HOLISTIC
                        </div>
                        <div class="logo_text pb-1" style="text-align:center; color:rgb(27,184,191);">CARE
                        </div>
                        <p>compassion with competence</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="https://wa.me/message/L53K65VGCECJD1"><i style="color:rgb(27,184,191);" class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.facebook.com/IntegratedHolisticCaregivers?mibextid=ZbWKwL"><i style="color:rgb(27,184,191);" class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/integrated-holistic-care/"><i style="color:rgb(27,184,191);" class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="https://instagram.com/integratedholistic.care?igshid=ZGUzMzM3NWJiOQ=="><i style="color:rgb(27,184,191);" class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="integratedholisticcare.org" target="_blank">INTEGRATED HOLISTIC CARE</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_links">
                    <div class="footer_title">Quick menu</div>
                    <ul class="footer_list">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li><a href="{{ route('about.index') }}">About us</a></li>
                        <!-- <li><a href="#">Testimonials</a></li>-->
                        <li class=""><a href="{{ route('services.index') }}">services</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                        <!-- <li><a href="#">Facts</a></li> -->
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_links">
                    <div class="footer_title">Useful Links</div>
                    <ul class="footer_list">
                        <li><a href="https://wa.me/message/L53K65VGCECJD1">whatsapp</a></li>
                        <li><a href="https://www.facebook.com/IntegratedHolisticCaregivers?mibextid=ZbWKwL">facebook</a></li>
                        <li><a href="https://instagram.com/integratedholistic.care?igshid=ZGUzMzM3NWJiOQ==">instagram</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_contact">
                    <div class="footer_title">Contact Us</div>
                    <div class="footer_contact_info">
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Address:</div>
                            <div class="footer_contact_line">P.o box 37129-00100
                                Emperor Plaza Koinange Streets 4th Floor, suits 422/426</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Phone:</div>
                            <div class="footer_contact_line">020 2352211
                                |
                                0745234867</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Email:</div>
                            <div class="footer_contact_line">info@integratedholisticcare.org</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/video-js/video.min.js"></script>
<script src="plugins/video-js/Youtube.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
@stack('scripts')
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
