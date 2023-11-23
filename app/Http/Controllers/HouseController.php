<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
class HouseController extends Controller
{
   public function create(Request $request)
{
    // Kiểm tra va xử lý dữ liệu từ form
    $validatedData = $request->validate([
        'house_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'number_of_bedrooms' => 'required|integer',
        'number_of_bathrooms' => 'required|integer',
        'area' => 'required|numeric',
        'status' => 'required|in:for_rent,not_available',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Thêm quy tắc kiểm tra ảnh
        //Thêm các quy tắc kiểm tra khác nếu cần
    ]);

    // Lưu dữ liệu vào cơ sở dữ liệu
    $house = new House();
    $house -> house_name = $validatedData['house_name'];
    $house -> address = $validatedData['address'];
    $house -> number_of_bedrooms = $validatedData['number_of_bedrooms'];
    $house -> number_of_bathrooms = $validatedData['number_of_bathrooms'];
    $house -> area = $validatedData['area'];
    $house -> rent_price = $validatedData['rent_price'];
    $house -> status = $validatedData['status'];

    // Lưu ảnh vào storage và lưu đường dẫn vào trường images
    if ($request->hasFile('image')){
        $imagePath = $request->file('images')->store('house_image', 'public');
        $house->image = $imagePath;
    }
    // $house = House::find(1);
    // $imageUrl = $house->images_url;
    // Thêm các trường khác nếu cần
    $house -> save();

    // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
    return redirect() -> route('home')->with('success', 'Sản phẩm đã được đăng thành công!');
}
}