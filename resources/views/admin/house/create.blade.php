@extends('admin.layout.main')
@section('content')


<div class="content-body">

    <h2 style="margin-left: 50px; margin-top:20px">Đăng sản phẩm - Ngôi nhà cho thuê</h2>

    <form action="{{route('house.create')}}" method="post" style="margin-left: 50px">
       @csrf
        <!-- Thông tin cơ bản -->
        <label for="house_name">Tên ngôi nhà:</label>
        <input type="text" id="house_name" name="house_name" required><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="number_of_bedrooms">Số phòng ngủ:</label>
        <input type="number" id="number_of_bedrooms" name="number_of_bedrooms" required><br>

        <label for="number_of_bathrooms">Số phòng tắm:</label>
        <input type="number" id="number_of_bathrooms" name="number_of_bathrooms" required><br>

        <label for="area">Diện tích (m²):</label>
        <input type="number" id="area" name="area" required><br>

        <!-- Giá thuê -->
        <label for="rent_price">Giá thuê (VNĐ/tháng):</label>
        <input type="number" id="rent_price" name="rent_price" required><br>

        <!-- Trạng thái -->
        <label for="status">Trạng thái:</label>
        <select id="status" name="status" required>
            <option value="for_rent">Cho thuê</option>
            <option value="not_available">Không có sẵn</option>
        </select><br>

        <!-- Ảnh -->
        <label for="images">Chọn ảnh:</label>
        <input type="file" id="images" name="images" accept="image/*"><br>

        <!-- Nút đăng sản phẩm -->
        <button type="submit">Đăng sản phẩm</button>
    </form>

</div>


@endsection