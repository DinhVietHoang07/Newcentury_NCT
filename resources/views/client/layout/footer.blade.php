    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="#"><img src="img/footer-logo.png" alt=""></a>
                            </div>
                            <p>Subscribe our newsletter gor get notification about new updates.</p>
                            <form action="#" class="newslatter-form">
                                <input type="text" placeholder="Enter your email...">
                                <button type="submit"><i class="fa fa-location-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        {{-- <div class="footer-widget">
                            <h4>Property City</h4>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Florida</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">New York</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Washington</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Los Angeles</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">St Louis</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Jacksonville</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">San Jose</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">San Diego</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h4>Social</h4>
                            <ul class="social">
                                <li><i class="ti-facebook"></i> <a href="{{ isset($Information) ? $Information->facebook : '#' }}" target="_blank">Facebook</a></li>
                                <li><i class="ti-instagram"></i> <a href="{{ isset($Information) ? $Information->instagram : '#' }}" target="_blank">Instagram</a></li>
                                <li><i class="ti-twitter-alt"></i> <a href="{{ isset($Information) ? $Information->twitter : '#' }}" target="_blank">Twitter</a></li>
                                <li><i class="ti-linkedin"></i> <a href="{{ isset($Information) ? $Information->linkedin : '#' }}" target="_blank">linkedin</a></li>
                                <li><i class="ti-youtube"></i> <a href="{{ isset($Information) ? $Information->youtube : '#' }}" target="_blank">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <h4>Contact Us</h4>
                            <ul class="contact-option">
                                <li><i class="fa fa-map-marker"></i>{{ isset($Information) ? $Information->address : '16 Creek Ave, <span>NY</span>' }}</li>
                                <li><i class="fa fa-phone"></i>{{ isset($Information) ? $Information->phone : '(+12) 345 6789' }}</li>
                                <li><i class="fa fa-envelope"></i> {{ isset($Information) ? $Information->email : 'info.colorlib@gmail.com' }}</li>
                                {{-- <li><i class="fa fa-clock-o"></i> Mon - Sat, 08 AM - 06 PM</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
