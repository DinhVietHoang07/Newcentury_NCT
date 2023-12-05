@extends('admin.layout.main')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">House</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form
                        action="{{ isset($information) ? route('admin.information.update', $information->id) : route('admin.information.post') }}"
                        method="POST" enctype="multipart/form-data" class="card">
                        @csrf
                        @method(isset($information) ? 'PUT' : 'POST')
                        <div class="card-body">
                            <h4 class="card-title">Information</h4>
                            <div class="row">
                                <div class="col-md-6 col-lg-8">
                                    <div class="form-group col-lg-12">
                                        <label for="name">Name web</label>
                                        <input type="text"
                                            class="form-control @error('name') border border-danger @enderror"
                                            name="name"
                                            value="{{ isset($information) ? $information->name : old('name') }}"
                                            id="name" placeholder="Enter Name web">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex p-0">
                                        <div class="form-group col-lg-6">
                                            <label for="email2">Email Address</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') border border-danger @enderror"
                                                value="{{ isset($information) ? $information->email : old('email') }}"
                                                id="email2" placeholder="Enter Email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="number">Phone</label>
                                            <input type="text" name="phone"
                                                value="{{ isset($information) ? $information->phone : old('phone') }}"
                                                class="form-control @error('phone') border border-danger @enderror"
                                                id="number" placeholder="Enter Number Phone">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group d-flex p-0">
                                        <div class="form-group col-lg-6">
                                            <label for="fb-url">Facebook URL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="fb-addon3"><i
                                                            class="icon-social-facebook menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="facebook"
                                                    value="{{ isset($information) ? $information->facebook : old('facebook') }}"
                                                    class="form-control" id="fb-url" aria-describedby="fb-addon3">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="ins-url">Instagram URL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="ins-addon3"><i
                                                            class="icon-social-instagram menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="instagram" class="form-control"
                                                    value="{{ isset($information) ? $information->instagram : old('instagram') }}"
                                                    id="ins-url" aria-describedby="ins-addon3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex p-0">
                                        <div class="form-group col-lg-6">
                                            <label for="in-url">Linkedin URL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="in-addon3"><i
                                                            class="icon-social-linkedin menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="linkedin"
                                                    value="{{ isset($information) ? $information->linkedin : old('linkedin') }}"
                                                    class="form-control" id="in-url" aria-describedby="in-addon3">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tw-url">Twitter URL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="tw-addon3"><i
                                                            class="icon-social-twitter menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="twitter"
                                                    value="{{ isset($information) ? $information->twitter : old('twitter') }}"
                                                    class="form-control" id="tw-url" aria-describedby="tw-addon3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex p-0">
                                        <div class="form-group col-lg-6">
                                            <label for="yb-url">Youtube URL</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="yb-addon3"><i
                                                            class="icon-social-youtube menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="Youtube"
                                                    value="{{ isset($information) ? $information->youtube : old('youtube') }}"
                                                    class="form-control" id="yb-url" aria-describedby="yb-addon3">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="map-url">Address</label>
                                            <div class="input-group mb-3 @error('address') border border-danger @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="map-addon3"><i
                                                            class="icon-map menu-icon"></i></span>
                                                </div>
                                                <input type="text" name="address"
                                                    value="{{ isset($information) ? $information->address : old('address') }}"
                                                    class="form-control" id="map-url" aria-describedby="map-addon3">
                                            </div>
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Content About</label>
                                        <textarea id="addContent" class="form-control @error('content') border border-danger @enderror"
                                            placeholder="Enter About Web" name="content">{{ isset($information) ? $information->content : old('content') }}</textarea>
                                        @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label">Logo</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="imagecheck mb-4">
                                                        <input name="logo" type="file"
                                                            class="logo form-control @error('logo') border border-danger @enderror">
                                                        <figure
                                                            class="imagecheck-figure {{ empty($information) ? 'd-none' : '' }}">
                                                            <img width="160px" src="{{ asset(isset($information) ? $information->logo : '') }}"
                                                                alt="title" class="imagecheck-image">
                                                        </figure>
                                                        @error('logo')
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
    {{-- contact , information , blog, bảo trì, service ( cung ứng, cho thuê) sủaw status thành service loại, thêm service , bannner show 3 house xịn đắt nhất, --}}
@endpush
