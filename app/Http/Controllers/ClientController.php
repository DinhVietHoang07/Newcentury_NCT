<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $house;
    public function __construct(House $house)
    {
        $this->house = $house;
    }
    public function index()
    {
        $banner = $this->house->orderBy('viewer', 'DESC')->limit(3)->get();
        foreach ($banner as $bn) {
            $bn->images = json_decode($bn->images);
        }
        // dd($banner);
        return view('client.index', compact('banner'));
    }
}
