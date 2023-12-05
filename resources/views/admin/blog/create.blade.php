@extends('admin.layout.main')
@section('title', 'blog')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.post') }}"
                        method="POST" enctype="multipart/form-data" class="card">
                        @csrf
                        @method(isset($blog) ? 'PUT' : 'POST')
                        <div class="card-header">
                            <div class="card-title">blog</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-8">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text"
                                            class="form-control @error('title') border border-danger @enderror"
                                            name="title" value="{{ isset($blog) ? $blog->title : old('title') }}"
                                            id="title" placeholder="Enter title post">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Content About</label>
                                        <textarea id="addContent" class="form-control @error('content') border border-danger @enderror"
                                            placeholder="Enter content post" name="content">{{ isset($blog) ? $blog->content : old('content') }}</textarea>
                                        @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label">Thumbnail</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="imagecheck mb-4">
                                                        <input name="thumbnail" type="file"
                                                            class="logo form-control @error('thumbnail') border border-danger @enderror">
                                                        <figure class="imagecheck-figure">
                                                            <img width="150px" src="{{ asset(isset($blog) ? $blog->thumbnail : '') }}"
                                                                alt="title" class="imagecheck-image">
                                                        </figure>
                                                        @error('thumbnail')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#addContent').summernote({
            placeholder: 'Nội dung',
            tabsize: 2,
            height: 300
        });
        $(".logo").change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $(".imagecheck-image").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
