@extends('client.layout.main')
@section('content')
    <!-- Property Details Hero Section Begin -->
    <section class="pd-hero-section set-bg" data-setbg="{{ asset(isset($service->images) ? $service->images[0] : 'client/img/properties/product-content-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="pd-hero-text">
                        @if ($service->service->slug == 'xu-ly-tham-ngam' || $service->service->slug == 'bao-tri')
                        @else
                            <p class="room-location"><i class="icon_pin"></i> {{ $service->address }}</p>
                        @endif
                        <h2>{{ $service->house_name }}</h2>

                        @if ($service->service->slug == 'xu-ly-tham-ngam' || $service->service->slug == 'bao-tri')
                        @else
                            <div class="room-price">
                                <span>Start Form:</span>
                                <p>$3.000.000</p>
                            </div>
                            <ul class="room-features">
                                <li>
                                    <i class="fa fa-arrows" data-toggle="tooltip" data-placement="top" title="Diện tích nhà" data-original-title=""></i>
                                    <p>{{ $service->area }} m<sup>2</sup></p>
                                </li>   
                                <li>
                                    <i class="fa fa-bed" data-toggle="tooltip" data-placement="top" title="Phòng ngủ" data-original-title=""></i>
                                    <p>{{ $service->number_of_bedrooms }} Phòng</p>
                                </li>
                                <li>
                                    <i class="fa fa-arrows-alt" data-toggle="tooltip" data-placement="top" title="Diện tích phòng" data-original-title=""></i>
                                    <p>{{ $service->area_bedrooms }} m<sup>2</sup></p>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Hero Section Begin -->

    <!-- Property Details Section Begin -->
    <section class="property-details-section spad">
        <div class="container">
            @if ($service->service->slug == 'xu-ly-tham-ngam' || $service->service->slug == 'bao-tri')
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
                        <p>{!! $service->content !!}</p>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-9">
                        <div class="pd-details-text">
                            <div class="pd-details-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-send"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-print"></i></a>
                                <a href="#"><i class="fa fa-cloud-download"></i></a>
                            </div>
                            <div class="property-more-pic">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img"
                                        src="{{ asset(isset($service->images) ? $service->images[0] : '') }}"
                                        alt="">
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        @if (isset($service->images))
                                            @foreach ($service->images as $el)
                                                <div class="pt" data-imgbigurl="{{ asset($el) }}"><img
                                                        src="{{ asset($el) }}" alt=""></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="pd-details-tab">
                                <div class="tab-item">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab-1" role="tab">Overview</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab-2" role="tab">Description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab-3" role="tab">Amenities</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-item-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                            <div class="property-more-table">
                                                <table class="left-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="pt-name">Loại dịch vụ</td>
                                                            <td class="p-value">{{ $service->service->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name">Địa chỉ</td>
                                                            <td class="p-value">{{ $service->address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name">Số phòng ngủ</td>
                                                            <td class="p-value">{{ $service->number_of_bedrooms }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name">Diện tích phòng ngủ</td>
                                                            <td class="p-value">{{ $service->area_bedrooms }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name">Diện tích căn</td>
                                                            <td class="p-value">{{ $service->area }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="right-table">
                                                    <tbody>
                                                        @if ($service->service->slug == 'cho-thue')
                                                            @if ($service->option->service_category == 'dai-han')
                                                                <tr>
                                                                    <td class="pt-name">Thời hạn hợp đồng</td>
                                                                    <td class="p-value">
                                                                        {{ $service->option->datetime_service }}
                                                                        tháng</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Loại cho thuê</td>
                                                                    <td class="p-value">dài hạn</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Giá thuê</td>
                                                                    <td class="p-value">{{ $service->rent_price }} VND</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td class="pt-name">Loại cho thuê</td>
                                                                    <td class="p-value">
                                                                        ngắn hạn
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Thuê phòng theo ngày</td>
                                                                    <td class="p-value">
                                                                        {{ $service->option->price_room_day }} VND</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Thuê phòng theo tháng</td>
                                                                    <td class="p-value">
                                                                        {{ $service->option->price_room_month }} VND
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Thuê nhà theo ngày</td>
                                                                    <td class="p-value">
                                                                        {{ $service->option->price_house_day }} VND
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name">Thuê nhà theo tháng</td>
                                                                    <td class="p-value">
                                                                        {{ $service->option->price_house_month }} VND
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @else
                                                            <tr>
                                                                <td class="pt-name">Giá chuyển nhượng</td>
                                                                <td class="p-value">{{ $service->rent_price }} VND</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="pd-table-desc">
                                                {!! $service->content !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                            <div class="pd-table-amenities">
                                                {!! $service->convenient !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 text-center"><a class="btn-contact" href="tel:{{ isset($Information) ? $Information->phone : '+123456789' }}">Liên hệ</a></div>
                            <div class="property-map">
                                <h4>Map</h4>
                                <div class="map-inside">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2942.5524090066037!2d-71.10245469994108!3d42.47980730490846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3748250c43a43%3A0xe1b9879a5e9b6657!2sWinter%20Street%20Public%20Parking%20Lot!5e0!3m2!1sen!2sbd!4v1577299251173!5m2!1sen!2sbd"
                                        height="320" style="border:0;" allowfullscreen=""></iframe>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="property-sidebar">
                            <h4>Search Property</h4>
                            <form action="#" class="sidebar-search">
                                <div class="sidebar-btn">
                                    <div class="bt-item">
                                        <input type="radio" name="s-type" id="st-buy" checked>
                                        <label for="st-buy">Buy</label>
                                    </div>
                                    <div class="bt-item">
                                        <input type="radio" name="s-type" id="st-rent">
                                        <label for="st-rent">Rent</label>
                                    </div>
                                </div>
                                <select>
                                    <option value="">Locations</option>
                                </select>
                                <select>
                                    <option value="">Status</option>
                                </select>
                                <select>
                                    <option value="">No of Bedroom</option>
                                </select>
                                <select>
                                    <option value="">No of Bathrooms</option>
                                </select>
                                <select>
                                    <option value="">No of Guest</option>
                                </select>
                                <div class="room-size-range">
                                    <div class="price-text">
                                        <label for="roomsizeRangeP">Size:</label>
                                        <input type="text" id="roomsizeRangeP" readonly>
                                    </div>
                                    <div id="roomsize-range-P" class="slider"></div>
                                </div>
                                <div class="price-range-wrap">
                                    <div class="price-text">
                                        <label for="priceRangeP">Price:</label>
                                        <input type="text" id="priceRangeP" readonly>
                                    </div>
                                    <div id="price-range-P" class="slider"></div>
                                </div>
                                <button type="submit" class="search-btn">Search Property</button>
                            </form>
                            <div class="best-agents">
                                <h4>Best Agents</h4>
                                <a href="#" class="ba-item">
                                    <div class="ba-pic">
                                        <img src="{{ asset('client/img/properties/best-agent-1.jpg') }}" alt="">
                                    </div>
                                    <div class="ba-text">
                                        <h5>Lester Bradley</h5>
                                        <span>Company Agents</span>
                                        <p class="property-items">6 property </p>
                                    </div>
                                </a>
                                <a href="#" class="ba-item">
                                    <div class="ba-pic">
                                        <img src="{{ asset('client/img/properties/best-agent-2.jpg') }}" alt="">
                                    </div>
                                    <div class="ba-text">
                                        <h5>Janie Blair</h5>
                                        <span>Company Agents</span>
                                        <p class="property-items">6 property </p>
                                    </div>
                                </a>
                                <a href="#" class="ba-item">
                                    <div class="ba-pic">
                                        <img src="{{ asset('client/img/properties/best-agent-3.jpg') }}" alt="">
                                    </div>
                                    <div class="ba-text">
                                        <h5>Sophia Cole</h5>
                                        <span>Marketing & Ceo</span>
                                        <p class="property-items">6 property </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- Property Details Section End -->

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
