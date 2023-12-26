<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    protected $information;
    public function __construct(Information $information)
    {
        $this->information = $information;
    }

    public function showInformation()
    {
        $information = $this->information->first();
        // dd($information);
        return view('admin.information.index', compact('information'));
    }
    public function store(InformationRequest $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('logo')) {
                $images = $request->file('logo');
                $path = Storage::disk('public')->put('logo', $images);
                $data['logo'] = 'storage/' . $path;
            }
            $this->information->create($data);
            return redirect()->route('admin.information')->with('success', 'Thêm thông tin công ty thành công!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.dashboard');
        }
    }
    public function update($id, InformationRequest $request)
    {
        try {
            $information = $this->information->find($id);
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('logo')) {
                $images = $request->file('logo');
                $path = Storage::disk('public')->put('logo', $images);
                $data['logo'] = 'storage/' . $path;
            }
            $information->update($data);
            return redirect()->route('admin.information.index')->with('success', 'Sửa thông tin công ty thành công!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.information.index');
        }
    }

    public function clientAbout()
    {
        $abouts = $this->information->first();
        return view('client.about', compact('abouts'));
    }
}
