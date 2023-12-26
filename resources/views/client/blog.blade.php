@extends('client.layout.main')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Blog List</h2>
                        <div class="breadcrumb-option">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Blog Default</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                @foreach ($blog as $bl)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-item">
                            <div class="sb-pic">
                                <img src="{{ asset($bl->thumbnail) }}" alt="">
                            </div>
                            <div class="sb-text">
                                <ul>
                                    <li><i class="fa fa-user"></i> Admin</li>
                                    <li><i class="fa fa-clock-o"></i> {{ $bl->created_at->format('D m, Y') }}</li>
                                    <li><i class="fa fa-eye"></i> {{ $bl->viewer }} xem</li>
                                </ul>
                                <h4><a href="{{ route('blog-detail', $bl->id) }}">{{ $bl->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 d-flex justify-content-center">
                        {{ $blog->onEachSide(2)->links('client.pagination.index') }}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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
