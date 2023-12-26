@extends('admin.layout.main')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Đăng sản phẩm - Ngôi nhà cho thuê</h2>
                            <div class="form-validation">
                                <form class="form-valide"
                                    action="{{ isset($house) ? route('admin.house.update', $house->id) : route('admin.house.post') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method(isset($house) ? 'PUT' : 'POST')
                                    <div class="form-group row house_name">
                                        <label class="col-lg-3 col-form-label" for="house_name">Tên ngôi nhà <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control @error('house_name') border border-danger @enderror"
                                                id="house_name"
                                                value="{{ isset($house) ? $house->house_name : old('house_name') }}"
                                                name="house_name" placeholder="Nhập tên ngôi nhà..">
                                        </div>
                                        @error('house_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row address"
                                        style="{{ isset($house) && $house->address != null ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="address">Địa chỉ <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control @error('address') border border-danger @enderror"
                                                id="address"
                                                value="{{ isset($house) ? $house->address : old('address') }}"
                                                name="address" placeholder="Nhập địa chỉ..">
                                        </div>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row number_of_bedrooms"
                                        style="{{ isset($house) && $house->number_of_bedrooms != null ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="number_of_bedrooms">Số phòng ngủ <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number"
                                                class="form-control @error('number_of_bedrooms') border border-danger @enderror"
                                                id="number_of_bedrooms"
                                                value="{{ isset($house) ? $house->number_of_bedrooms : old('number_of_bedrooms') }}"
                                                name="number_of_bedrooms" placeholder="Số phòng ngủ..">
                                        </div>
                                        @error('number_of_bedrooms')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row area_bedrooms"
                                        style="{{ isset($house) && $house->area_bedrooms != null ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="area_bedrooms">Diện tích phòng ngủ<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number"
                                                class="form-control @error('area_bedrooms') border border-danger @enderror"
                                                id="area_bedrooms"
                                                value="{{ isset($house) ? $house->area_bedrooms : old('area_bedrooms') }}"
                                                name="area_bedrooms" placeholder="Diện tích phòng ngủ..">
                                        </div>
                                        @error('area_bedrooms')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row area"
                                        style="{{ isset($house) && $house->area != null ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="area">Diện tích căn phòng(m2) <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input class="form-control @error('area') border border-danger @enderror"
                                                id="area" value="{{ isset($house) ? $house->area : old('area') }}"
                                                name="area" rows="5" placeholder="Diện tích..">
                                        </div>
                                        @error('area')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row rent_price"
                                        style="{{ isset($house) && isset($house->rent_price) ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="rent_price">Giá thuê (VNĐ/tháng): <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text"
                                                class="form-control @error('rent_price') border border-danger @enderror"
                                                id="rent_price"
                                                value="{{ isset($house) ? $house->rent_price : old('rent_price') }}"
                                                name="rent_price" placeholder="...VNĐ">
                                        </div>
                                        @error('rent_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="service_id">Loại dịch vụ <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select
                                                class="form-control @error('service_id') border border-danger @enderror"
                                                id="service_id" name="service_id">
                                                <option value="">Chọn loại dịch vụ</option>
                                                @foreach ($service as $sv)
                                                    <option
                                                        {{ isset($house) && $house->service_id == $sv->id ? 'selected' : '' }}
                                                        value="{{ $sv->id }}" data-slug="{{ $sv->slug }}">
                                                        {{ $sv->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('service_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row service_category"
                                        style="{{ isset($house) && isset($house->option) ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="service_category">Loại cho thuê<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select
                                                class="form-control @error('service_category') border border-danger @enderror"
                                                id="service_category" name="service_category">
                                                <option>Chọn loại cho thuê</option>
                                                <option {{ isset($house) && isset($house->option) ? 'selected' : '' }}
                                                    value="dai-han" data-slug="dai-han">
                                                    Dài hạn</option>
                                                <option {{ isset($house) && isset($house->option) ? 'selected' : '' }}
                                                    value="ngan-han" data-slug="ngan-han">
                                                    Ngắn hạn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row datetime_service"
                                        style="{{ isset($house) && isset($house->option->service_category) && $house->option->service_category == 'dai-han' ? '' : 'display: none;' }}">
                                        <label class="col-lg-3 col-form-label" for="datetime_service">Thời hạn hợp đồng
                                            (tháng)<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="datetime_service"
                                                value="{{ isset($house->option->service_category) && $house->option->service_category == 'dai-han' ? $house->option->datetime_service : '' }}"
                                                name="datetime_service" placeholder="Thời hạn hợp đồng">
                                        </div>
                                    </div>
                                    <div class="price_service"
                                        style="{{ isset($house) && isset($house->option->service_category) && $house->option->service_category == 'ngan-han' ? '' : 'display: none;' }}">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="price_room_day">Giá thuê phòng
                                                theo
                                                ngày (VNĐ/ngày)<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price_room_day"
                                                    value="{{ isset($house->option->service_category) && $house->option->service_category == 'ngan-han' ? $house->option->price_room_day : old('price_room') }}"
                                                    name="price_room_day" placeholder="Giá thuê phòng theo ngày">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="price_room_month">Giá thuê phòng
                                                theo
                                                tháng (VNĐ/tháng)<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price_room_month"
                                                    value="{{ isset($house->option->service_category) && $house->option->service_category == 'ngan-han' ? $house->option->price_room_month : old('price_room_month') }}"
                                                    name="price_room_month" placeholder="Giá thuê phòng theo tháng">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="price_house_day">Giá thuê nguyên
                                                căn
                                                theo
                                                ngày (VNĐ/ngày)<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price_house_day"
                                                    value="{{ isset($house->option->service_category) && $house->option->service_category == 'ngan-han' ? $house->option->price_house_day : old('price_house') }}"
                                                    name="price_house_day" placeholder="Giá thuê nguyên căn theo ngày">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="price_room_month">Giá thuê nguyên
                                                căn
                                                theo
                                                tháng (VNĐ/tháng)<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price_house_month"
                                                    value="{{ isset($house->option->service_category) && $house->option->service_category == 'ngan-han' ? $house->option->price_house_month : old('price_house_month') }}"
                                                    name="price_house_month" placeholder="Giá thuê nguyên căn theo tháng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row images">
                                        <label class="col-lg-3 col-form-label" for="images">Chọn ảnh <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file"
                                                class="form-control @error('images') border border-danger @enderror"
                                                id="images" name="images[]" placeholder="images" accept="image/*"
                                                multiple>
                                            <div id="imagePreview">
                                                @if (isset($house) && $house->images != null)
                                                    @foreach ($house->images as $img)
                                                        <img src="{{ asset($img) }}" width="100px" alt="">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        @error('images')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group convenient">
                                        <label>Tiện nghi</label>
                                        <textarea id="addConvenient" class="form-control @error('convenient') border border-danger @enderror"
                                            placeholder="Enter convenient post" name="convenient">{{ isset($house) ? $house->convenient : old('convenient') }}</textarea>
                                        @error('convenient')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group content">
                                        <label>Nội dung</label>
                                        <textarea id="addContent" class="form-control @error('content') border border-danger @enderror"
                                            placeholder="Enter content post" name="content">{{ isset($house) ? $house->content : old('content') }}</textarea>
                                        @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#addContent').summernote({
            placeholder: 'Nội dung',
            tabsize: 2,
            height: 300
        });
        $('#addConvenient').summernote({
            placeholder: 'Nội dung',
            tabsize: 2,
            height: 300
        });
        document.getElementById('images').addEventListener('change', function(event) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = ''; // Xóa bất kỳ ảnh nào đã hiển thị trước đó

            // Lặp qua từng tệp ảnh được chọn
            for (var i = 0; i < event.target.files.length; i++) {
                var imageFile = event.target.files[i];

                // Kiểm tra xem tệp có phải là ảnh hay không
                if (imageFile.type.match(/^image\//)) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Hiển thị ảnh trên trang
                        var imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.alt = 'Image Preview';
                        imgElement.style.maxWidth = '100px';
                        imgElement.style.margin = '5px';
                        imgElement.style.cursor = 'pointer';

                        // Thêm sự kiện click để xóa ảnh
                        imgElement.addEventListener('click', function() {
                            imagePreview.removeChild(imgElement);
                        });

                        imagePreview.appendChild(imgElement);
                    };

                    // Đọc dữ liệu ảnh
                    reader.readAsDataURL(imageFile);
                } else {
                    alert('Vui lòng chọn một tệp ảnh.');
                }
            }
        });
        //check loại dịch vụ đã chọn
        $("#service_id").on('change', function() {
            //nếu là bảo trì và xu-ly-tham-ngam
            if ($('option:selected').data('slug') == 'bao-tri' || $('option:selected').data('slug') ==
                'xu-ly-tham-ngam') {
                $('.rent_price, .area, .area_bedrooms, .number_of_bedrooms, .address, .convenient').css('display',
                    'none');
                // $('.rent_price, .area, .area_bedrooms, .number_of_bedrooms, .address').find('input').val(
                //     '');
                //ẩn các input k cần
                $('.service_category').css('display', 'none');
                $('.service_category').find('select').val('Chọn loại cho thuê');
                $('.datetime_service').css('display', 'none');
                // $('.datetime_service').find('input').val('');
                $('.price_service').css('display', 'none');
                // $('.price_service').find('input').val('');
            } else { // còn đây là cho thuê và chuyển nhượng
                $('.area, .area_bedrooms, .number_of_bedrooms, .address, .convenient').css('display', '');
                if ($('option:selected').data('slug') == 'chuyen-nhuong') {
                    $('.rent_price').css('display', '');
                    // $('.rent_price').find('input').val('');
                } else {
                    $('.rent_price').css('display', 'none');
                    // $('.rent_price').find('input').val('');
                }

                //nếu là cho thuê
                if ($('option:selected').data('slug') == 'cho-thue') {
                    $('.service_category').css('display', ''); // form select loại cho thuê
                    $('.service_category').find('select').val('Chọn loại cho thuê');
                    // hiển thị select chọn loại cho thuê
                    $("#service_category").on('change', function() {
                        // check loại cho thuê nếu là dài hạn
                        if ($('#service_category option:selected').data('slug') == 'dai-han') {
                            //hiển thị tiền
                            $('.rent_price').css('display', '');
                            // $('.rent_price').find('input').val('');
                            $('.datetime_service').css('display', ''); // hiển thị thời hạn hợp đồng
                        } else {
                            $('.datetime_service').css('display', 'none');
                            // $('.datetime_service').find('input').val('');
                        }

                        // check loại cho thuê nếu là ngắn hạn
                        if ($('#service_category option:selected').data('slug') == 'ngan-han') {
                            $('.rent_price').css('display', 'none');
                            // $('.rent_price').find('input').val('');
                            $('.price_service').css('display', ''); // hiển thị thời hạn hợp đồng
                        } else {
                            $('.price_service').css('display', 'none');
                            // $('.price_service').find('input').val('');
                        }
                    })
                } else {
                    $('.service_category').css('display', 'none');
                    $('.service_category').find('select').val('Chọn loại cho thuê');
                    $('.datetime_service').css('display', 'none');
                    // $('.datetime_service').find('input').val('');
                    $('.price_service').css('display', 'none');
                    // $('.price_service').find('input').val('');
                }
            }
        })
        // hiển thị select chọn loại cho thuê
        $("#service_category").on('change', function() {
            // check loại cho thuê nếu là dài hạn
            if ($('#service_category option:selected').data('slug') == 'dai-han') {
                //hiển thị tiền
                $('.rent_price').css('display', '');
                // $('.rent_price').find('input').val('');
                $('.datetime_service').css('display', ''); // hiển thị thời hạn hợp đồng
            } else {
                $('.datetime_service').css('display', 'none');
                // $('.datetime_service').find('input').val('');
            }

            // check loại cho thuê nếu là ngắn hạn
            if ($('#service_category option:selected').data('slug') == 'ngan-han') {
                $('.rent_price').css('display', 'none');
                // $('.rent_price').find('input').val('');
                $('.price_service').css('display', ''); // hiển thị thời hạn hợp đồng
            } else {
                $('.price_service').css('display', 'none');
                // $('.price_service').find('input').val('');
            }
        })
    </script>
@endpush
