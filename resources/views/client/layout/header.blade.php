<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <nav class="main-menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">HOME</a></li>
                            <li>
                                <div class="top-right p-0 m-0">
                                    <div class="language-option">
                                        <a href="#">SERVICE</a>
                                        <i class="fa fa-angle-down"></i>
                                        <div class="flag-dropdown mt-4" style="min-width: 180px; left: 0 !important;">
                                            <ul>
                                                @foreach ($Service as $sv)
                                                    @if ($sv->slug == 'xu-ly-tham-ngam')
                                                        @if ($House_ser != null)
                                                            <li class="m-0 p-0 col-12"><a
                                                                    href="{{ route('service-detail', $House_ser->id) }}">{{ $sv->name }}</a>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li class="m-0 p-0 col-12"><a
                                                                href="{{ route('service', $sv->id) }}">{{ $sv->name }}</a>
                                                        </li>
                                                    @endif
                            </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
        </li>
        <!-- <li><a href="/po">Agets</a></li> -->
        <li><a href="{{ route('blog') }}">News</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        </nav>
    </div>
    <div class="col-lg-5">
        <div class="top-right">
            <div class="language-option">
                <img src="{{ asset('client/img/vietnam.png') }}" alt="">
                <span>Việt Nam</span>
                <i class="fa fa-angle-down"></i>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">English</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">China</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="property-sub">Submit Property</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="nav-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/"><img height="80px"
                                src="{{ asset(isset($Information) ? $Information->logo : 'client/img/Logo_NewCentury4.png') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="nav-logo-right">
                        <ul>
                            <li>
                                <i class="icon_phone"></i>
                                <div class="info-text">
                                    <span>Phone:</span>
                                    <p><a class="text-black-50"
                                            href="tel:+{{ isset($Information) ? $Information->phone : '' }}">{{ isset($Information) ? $Information->phone : '(+12) 345 6789' }}</a>
                                    </p>
                                </div>
                            </li>
                            {{-- <li>
                                <i class="icon_map"></i>
                                <div class="info-text">
                                    <span>Address:</span>
                                    <p>{{ isset($Information) ? $Information->address : '16 Creek Ave, <span>NY</span>' }}</p>
                                </div>
                            </li> --}}
                            <li>
                                <i class="icon_mail"></i>
                                <div class="info-text">
                                    <span>Email:</span>
                                    <p><a class="text-black-50"
                                            href="mailto:{{ isset($Information) ? $Information->email : '' }}">{{ isset($Information) ? $Information->email : 'Info.cololib@gmail.com' }}</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
