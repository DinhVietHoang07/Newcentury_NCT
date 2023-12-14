<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $house;
    protected $service;
    public function __construct(House $house, Service $service)
    {
        $this->house = $house;
        $this->service = $service;
    }
    public function index()
    {
        $banner = $this->house->orderBy('viewer', 'DESC')->limit(3)->get();
        foreach ($banner as $bn) {
            if ($bn->images != null) {
                $bn->images = json_decode($bn->images);
            }
        }
        // dd($banner);
        return view('client.index', compact('banner'));
    }

    public function service($id)
    {
        $service = $this->house->where('service_id', $id)->paginate(5);
        return view('client.service', [
            'title' => $this->service->find($id)->name,
            'service' => $service
        ]);
    }

    public function serviceDetail($id)
    {
        $service = $this->house->find($id);
        return view('client.service-details', [
            'service' => $service
        ]);
    }
}
