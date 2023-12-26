<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function index()
    {
        $data = $this->blog->latest()->get();
        return view('admin.blog.index', compact('data'));
    }
    public function form()
    {
        return view('admin.blog.create');
    }
    public function edit($id)
    {
        $blog = $this->blog->find($id);
        return view('admin.blog.create', compact('blog'));
    }
    public function store(BlogRequest $request)
    {
        // dd($request->all());
        try {
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('thumbnail')) {
                $images = $request->file('thumbnail');
                $path = Storage::disk('public')->put('thumbnail', $images);
                $data['thumbnail'] = 'storage/' . $path;
                $this->blog->create($data);
            }
            return redirect()->route('admin.blog.index')->with('success', 'Thêm bài viết thành công!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.blog.create');
        }
    }
    public function update($id, BlogRequest $request)
    {
        try {
            $blog = $this->blog->find($id);
            $data = $request->all();
            unset($data['_token']);
            if ($request->hasFile('thumbnail')) {
                $images = $request->file('thumbnail');
                $path = Storage::disk('public')->put('thumbnail', $images);
                $data['thumbnail'] = 'storage/' . $path;
            }
            $blog->update($data);
            return redirect()->route('admin.blog.index')->with('success', 'Sửa bài viét thành công!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.blog.create', $id);
        }
    }
    public function delete($id)
    {
        try {
            $blog = $this->blog->find($id);
            $blog->delete();
            return response()->json(['success' => 'Sản phẩm đã được xóa thành công!']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.blog.index');
        }
    }

    public function blogClient()
    {
        $blog = $this->blog->latest()->get();
        return view('client.blog', compact('blog'));
    }

    public function blogClientDetail(Request $request)
    {
        $blog = $this->blog->find($request->post);
        return view('client.blogDetail', compact('blog'));
    }
}
