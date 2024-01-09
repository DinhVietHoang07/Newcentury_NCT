<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\House;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ClientController extends Controller
{
    protected $house;
    protected $service;
    protected $blog;
    public function __construct(House $house, Service $service, Blog $blog)
    {
        $this->house = $house;
        $this->service = $service;
        $this->blog = $blog;
    }
    public function index()
    {
        $banner = $this->house->with(['Service' => function ($query) {
            $query->where('slug', 'cho-thue');
        }])->orderBy('viewer', 'DESC')->limit(3)->get();
        // dd($banner);
        foreach ($banner as $bn) {
            if ($bn->images != null) {
                $bn->images = json_decode($bn->images);
            }
        }
        $serBaotri = $this->service->where('slug', '=', 'bao-tri')->first('id');
        $serChuyenNhuong = $this->service->where('slug', '=', 'chuyen-nhuong')->first('id');
        $serChoThue = $this->service->where('slug', '=', 'cho-thue')->first('id');
        $baoTri = $this->house->where('service_id', '=', $serBaotri->id)->orderBy('viewer', 'DESC')->get();
        $forRent = $this->house->where('service_id', '=', $serChuyenNhuong->id)->orwhere('service_id', '=', $serChoThue->id)->orderBy('viewer', 'DESC')->get();
        
        $blogs = $this->blog->orderBy('viewer', 'DESC')->limit(3)->get();

        // dd($forRent);
        foreach ($forRent as $fr) {
            if ($fr->images != null) {
                $fr->images = json_decode($fr->images);
            }
        }

        foreach ($baoTri as $bt) {
            if ($bt->images != null) {
                $bt->images = json_decode($bt->images);
            }
        }
        // dd($banner);
        return view('client.index', compact('banner', 'baoTri', 'forRent', 'blogs'));
    }

    public function service($id)
    {
        $service = $this->house->with('service')->where('service_id', $id)->paginate(5);
        return view('client.service', [
            'title' => $this->service->find($id)->name,
            'service' => $service
        ]);
    }

    public function serviceDetail($id)
    {
        if($id == 'xu-ly-tham-ngam') {
            $id_service = $this->service->where('slug', $id)->get('id');
            $id = $this->house->where('service_id', $id_service)->get('id');
        }
        $service = $this->house->find($id);
        $service->images = json_decode($service->images);
        if (Cookie::has('service' . $service->id) == false) {
            $service->viewer += 1;
            $service->save();
            Cookie::queue(Cookie::make('service' . $service->id, $service->id, 0.5));
        }
        $service->option = json_decode($service->option);
        return view('client.service-details', [
            'service' => $service
        ]);
    }

    public function blog()
    {
        $blog = $this->blog->paginate(6);
        return view('client.blog', [
            'blog' => $blog
        ]);
    }

    public function blogDetail($id)
    {
        $blog = $this->blog->find($id);
        $blogs = $this->blog->orderBy('viewer', 'DESC')->limit(2)->get();
        //đếm lượt xem blog
        if (Cookie::has('blog' . $blog->id) == false) {
            $blog->viewer += 1;
            $blog->save();
            Cookie::queue(Cookie::make('blog' . $blog->id, $blog->id, 0.5));
        }
        return view('client.blog-details', [
            'blog' => $blog,
            'blogs' => $blogs,
        ]);
    }
}
