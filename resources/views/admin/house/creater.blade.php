@extends('admin.layout.main')
@section('content')
    <!--**********************************
                                        Content body start
                                    ***********************************-->
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
                                    <div class="form-group row">
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
                                    <div class="form-group row">
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
                                    <div class="form-group row">
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
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="number_of_bathrooms">Số phòng tắm <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number"
                                                class="form-control @error('number_of_bathrooms') border border-danger @enderror"
                                                id="number_of_bathrooms"
                                                value="{{ isset($house) ? $house->number_of_bathrooms : old('number_of_bathrooms') }}"
                                                name="number_of_bathrooms" placeholder="Số phòng tắm..">
                                        </div>
                                        @error('number_of_bathrooms')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="area">Diện tích (m2) <span
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
                                    <div class="form-group row">
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
                                            <select class="form-control @error('service_id') border border-danger @enderror"
                                                id="service_id" name="service_id">
                                                <option>Chọn loại dịch vụ</option>
                                                @foreach ($service as $sv)
                                                    <option
                                                        {{ isset($house) && $house->service_id == $sv->id ? 'selected' : '' }}
                                                        value="{{ $sv->id }}">{{ $sv->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
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
    <!--**********************************
                                        Content body end
                                    ***********************************-->
@endsection
@push('js')
    <script>
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
    </script>
@endpush
