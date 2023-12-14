<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::latest()->get();
        // dd($data);
        return view('admin.service.index', compact('data'));
    }
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        // dd($request->all());
        $service->create($request->all());

        // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
        return redirect()->route('admin.service.index')->with('success', 'Dịch vụ đã được đăng thành công!');
    }
    public function edit($id)
    {
        $data = Service::latest()->get();
        $service = Service::find($id);
        return view('admin.service.index', compact('data', 'service'));
    }
    public function update($id, ServiceRequest $request)
    {
        $service = Service::find($id);
        $data = $request->all();
        unset($data['_token']);
        // dd(json_encode($images));
        $service->update($data);

        // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
        return redirect()->route('admin.service.index')->with('success', 'Dịch vụ đã được sửa thành công!');
    }
    public function delete($id)
    {
        try {
            $service = Service::find($id);
            $service->delete();
            // Redirect hoặc thực hiện hành động sau khi lưu dữ liệu
            return response()->json(['success' => 'Dịch vụ đã được xóa thành công!']);
        } catch (\Throwable $th) {
            // dd($th);
            return response()->json(['error' => 'Không thể xóa dịch vụ đang được sử dụng!'], 404);
        }
    }
}
