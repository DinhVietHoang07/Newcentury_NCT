<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseRequest;
use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Service;

class HouseController extends Controller
{

    public function index()
    {
        $data = House::with('service')->latest()->get();
        foreach ($data as $key) {
            $key['option'] = json_decode($key->option);
        }

        // dd($data);
        return view('admin.house.index', compact('data'));
    }
    public function create()
    {
        $service = Service::all();
        return view('admin.house.creater', compact('service'));
    }
    public function store(HouseRequest $request)
    {
        $data = $request->all();
        $data['viewer'] = 0;
        // dd($data);
        $service = Service::find($data['service_id'])->slug;
        if ($service == 'cho-thue' || $service == 'chuyen-nhuong') {
            $data['option'] = Null;
            if ($data['service_category'] == 'ngan-han') {
                $data['rent_price'] = Null;
                $data['option'] = json_encode([
                    'service_category' => $data['service_category'],
                    'price_room_day' =>  $data['price_room_day'],
                    'price_room_month' =>  $data['price_room_month'],
                    'price_house_day' =>  $data['price_house_day'],
                    'price_house_month' =>  $data['price_house_month'],
                ]);
            }

            if ($data['service_category'] == 'dai-han') {
                $data['option'] = json_encode([
                    'service_category' => $data['service_category'],
                    'datetime_service' =>  $data['datetime_service'],
                ]);
            }
            unset($data['_token'], $data['service_category'], $data['datetime_service'], $data['price_room_day'], $data['price_room_month'], $data['price_house_day'], $data['price_house_month']);
        } else {
            if (Service::find($data['service_id'])->slug == 'xu-ly-tham-ngam') {
                $check = House::where('service_id', Service::find($data['service_id'])->id)->first();
                if (empty($check) == false) {
                    return redirect()->route('admin.house.create')->with('Error', 'Loại dịch vụ này đã được sử dụng!');
                }
            }
            unset($data['_token'], $data['service_category'], $data['datetime_service'], $data['price_room_day'], $data['price_room_month'], $data['price_house_day'], $data['price_house_month'], $data['address'], $data['number_of_bedrooms'], $data['area'], $data['area_bedrooms'], $data['rent_price'], $data['option'], $data['convenient']);
        }
        // dd($data);
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $images[] = 'storage/images/' . $imageName;
            }
            $data['images'] =  json_encode($images);
        }
        // dd(json_encode($images));
        House::create($data);

        // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
        return redirect()->route('admin.house.index')->with('success', 'Sản phẩm đã được đăng thành công!');
    }
    public function edit($id)
    {
        $service = Service::all();
        $house = House::find($id);
        $house->option = json_decode($house->option);
        $house->images = json_decode($house->images);
        // dd($house->option->service_category);
        return view('admin.house.creater', compact('house', 'service'));
    }
    public function update($id, HouseRequest $request)
    {
        $house = House::find($id);
        $data = $request->all();
        $service = Service::find($data['service_id'])->slug;
        if ($service == 'cho-thue' || $service == 'chuyen-nhuong') {
            $data['option'] = Null;
            if ($data['service_category'] == 'ngan-han') {
                $data['rent_price'] = Null;
                $data['option'] = json_encode([
                    'service_category' => $data['service_category'],
                    'price_room_day' =>  $data['price_room_day'],
                    'price_room_month' =>  $data['price_room_month'],
                    'price_house_day' =>  $data['price_house_day'],
                    'price_house_month' =>  $data['price_house_month'],
                ]);
            }

            if ($data['service_category'] == 'dai-han') {
                $data['option'] = json_encode([
                    'service_category' => $data['service_category'],
                    'datetime_service' =>  $data['datetime_service'],
                ]);
            }
            unset($data['_token'], $data['service_category'], $data['datetime_service'], $data['price_room_day'], $data['price_room_month'], $data['price_house_day'], $data['price_house_month']);
        } else {
            unset($data['_token'], $data['service_category'], $data['datetime_service'], $data['price_room_day'], $data['price_room_month'], $data['price_house_day'], $data['price_house_month'], $data['address'], $data['number_of_bedrooms'], $data['area'], $data['area_bedrooms'], $data['rent_price'], $data['option'], $data['convenient']);
        } // dd($data);
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $images[] = 'storage/images/' . $imageName;
            }
            $data['images'] =  json_encode($images);
        }
        // dd(json_encode($images));
        $house->update($data);

        // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
        return redirect()->route('admin.house.index')->with('success', 'Sản phẩm đã được sửa thành công!');
    }
    public function delete($id)
    {
        $house = House::find($id);
        $house->delete();
        // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
        return response()->json(['success' => 'Sản phẩm đã được xóa thành công!']);
    }
}
