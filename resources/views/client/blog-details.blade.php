@extends('client.layout.main')
@section('content')
    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ asset('client/img/blog/blog-details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bd-hero-text">
                        <span>Real Estate</span>
                        <h2>{{ $blog->title }}</h2>
                        <ul>
                            <li><i class="fa fa-user"></i> Admin</li>
                            <li><i class="fa fa-clock-o"></i> {{ $blog->created_at->format('D m, Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Blog Details Hero Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 offset-lg-1">
                    <div class="blog-details-social">
                        <h6>Share</h6>
                        <div class="social-list">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{-- <div class="blog-details-title"> --}}
                    {{-- <h4>There is no better advertisement campaign that is low cost and also successful at the same
                            time.</h4>
                        <p>Great business ideas when utilized effectively can save lots of money. This is not only easy
                            for those who work full-time as an advertiser, but also for those who work from home.
                            Advertising from home is also a low cost option, which involves making and distributing
                            fliers. Usually potential customers will visit home for business dealing. Print good amount
                            of fliers and give it to anyone who is visiting home like family, friends, mailman, etc.
                            Business cards can also be distributed. Few selected people can be given sample of the
                            product. For those who work outside home, employ college students to distribute fliers at
                            supermarkets, community centers, or malls, especially on weekends, when there is a rush.</p>
                        <p>Spread the word by the mouth. Talk to everyone about the product and ask them to talk about
                            it to others. It’s a very powerful tool to increase the network and doesn’t even cost
                            anything. When receiving a casual call from family members and friends, don’t forget to tell
                            them about the latest events, discounts and promotions and ask them about what they are up
                            to. If the parties are into the business, it won’t hurt to promote each other. Joint
                            ventures can be started with trustable people of the same trade. The only cost that will be
                            incurred during the whole process is of printing fliers. For a better quality, professional
                            can be hired to design them, as they will be able to play with colors and write motivating
                            material.</p>
                        <div class="blog-quote">
                            <p>“Hospitality is a very wide field to talk about, so in this article I’ll share few tips,
                                small things that will make a big impact on your customers’ experience”.</p>
                        </div> --}}
                    <p>{!! $blog->content !!}</p>
                    {{-- </div> --}}
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-pic">
                        <div class="bd-pic-item small-item set-bg" data-setbg="{{asset('client/img/blog/blog-details-1.jpg')}}"></div>
                        <div class="bd-pic-item small-item set-bg" data-setbg="{{asset('client/img/blog/blog-details-2.jpg')}}"></div>
                        <div class="bd-pic-item large-item set-bg" data-setbg="{{asset('client/img/blog/blog-details-3.jpg')}}"></div>
                        <div class="bd-pic-item wide-item set-bg" data-setbg="{{asset('client/img/blog/blog-details-4.jpg')}}"></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="blog-more-details">
                        <h4>Fliers and business cards can be tacked.</h4>
                        <p>But before doing so, check out with the human resource department before placing the
                            information as most of the HR departments make it compulsory to consult them. Parents are
                            required to be in regular touch with the teachers to know about the progress of the child
                            and they have meetings from time to time. Do not miss this opportunity and spread the word.
                            Hand them the business card and fliers personally at the meeting, instead of just giving the
                            contact number. Get involved with fundraiser at schools, as it’s a nice approach to market
                            business. Prior to handing out the order received, collect all necessary information like
                            business card pack, fliers, with proper information. Information can be based on what is the
                            company about, what are the products and services provided, or how to get in touch with the
                            company. In each individual order, carefully place all of them and seal the package
                            properly. Presentation, too, is of importance and should be paid attention.</p>
                    </div>
                    <div class="tag-share-option">
                        <div class="tags">
                            <a href="#">Real Estate</a>
                            <a href="#">Properties</a>
                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Một số bài liên quan</h2>
                    </div>
                </div>
                @foreach ($blogs as $list)
                    <div class="col-lg-6">
                        <div class="single-blog-item">
                            <div class="sb-pic">
                                <img src="{{ asset($list->thumbnail) }}" alt="">
                            </div>
                            <div class="sb-text">
                                <ul>
                                    <li><i class="fa fa-user"></i> Admin</li>
                                    <li><i class="fa fa-clock-o"></i> {{ $list->created_at->format('D m, Y') }}</li>
                                    <li><i class="fa fa-eye"></i> {{ $list->viewer }}</li>
                                </ul>
                                <h4><a href="#">{{ $list->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Partner Carousel Section Begin -->
    <div class="partner-section">
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
@endsection
