@extends('client.layout.main')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section contact-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb-option">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2942.5524090066037!2d-71.10245469994108!3d42.47980730490846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3748250c43a43%3A0xe1b9879a5e9b6657!2sWinter%20Street%20Public%20Parking%20Lot!5e0!3m2!1sen!2sbd!4v1577299251173!5m2!1sen!2sbd"
                            height="700" style="border:0;" allowfullscreen=""></iframe>
                        <div class="map-inside">
                            <i class="icon_pin"></i>
                            <div class="inside-widget">
                                <h4>New York</h4>
                                <ul>
                                    <li>Phone: +12-345-6789</li>
                                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="contact-text">
                                <div class="section-title">
                                    <span>Contact</span>
                                    <h2>Get In Touch</h2>
                                </div>
                                <form action="{{ route('contact') }}" method="post" class="contact-form">
                                    @csrf
                                    <input class="@error('name') border-danger @enderror" name="name" type="text"
                                        placeholder="Name">
                                    <input class="@error('email') border-danger @enderror" name="email" type="text"
                                        placeholder="Email">
                                    <input class="@error('website') border-danger @enderror" name="website" type="text"
                                        placeholder="Website">
                                    <textarea placeholder="Messages" class="@error('message') border-danger @enderror" name="message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Partner Carousel Section Begin -->
    <div class="partner-section contact-partner">
        <div class="container">
            <div class="partner-carousel owl-carousel">
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="{{ asset('client/img/partner/partner-1.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="{{ asset('client/img/partner/partner-2.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="{{ asset('client/img/partner/partner-3.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="{{ asset('client/img/partner/partner-4.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="{{ asset('client/img/partner/partner-5.png') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Partner Carousel Section End -->

    <script src="{{ asset('admin/plugins/sweetalert/js/sweetalert.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: '{{ session('success') }}',
                icon: "success"
            });
        </script>
    @endif
@endsection
