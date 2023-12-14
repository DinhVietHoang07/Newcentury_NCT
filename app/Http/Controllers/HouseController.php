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
        if ($data['service_category'] == 'ngan-han') {
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
        if ($data['service_category'] == 'ngan-han') {
            $data['option'] = json_encode([
                'price_room_day' =>  $data['price_room_day'],
                'price_room_month' =>  $data['price_room_month'],
                'price_house_day' =>  $data['price_house_day'],
                'price_house_month' =>  $data['price_house_month'],
            ]);
        }

        if ($data['service_category'] == 'dai-han') {
            $data['option'] = json_encode([
                'datetime_service' =>  $data['datetime_service'],
            ]);
        }
        unset($data['_token'], $data['service_category'], $data['datetime_service'], $data['price_room_day'], $data['price_room_month'], $data['price_house_day'], $data['price_house_month']);
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
