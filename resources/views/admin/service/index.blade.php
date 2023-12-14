@extends('admin.layout.main')
@push('css')
    <link href="{{ asset('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Service</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Service</h4>
                            <div class="row">
                                <div class="col-9">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Tên</th>
                                                    <th>Loại hình</th>
                                                    <th>Chức năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $el)
                                                    <tr id="tr{{ $el->id }}">
                                                        <td>{{ $el->name }}</td>
                                                        <td>{{ $el->type == 'for_rent' ? 'Cho thuê' : 'Bảo trì'}}</td>
                                                        <td><span><a href="{{ route('admin.service.edit', $el->id) }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="" data-original-title="Edit"><i
                                                                        class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                <a data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="Close"><i
                                                                        data-id="{{ $el->id }}"
                                                                        data-route="{{ route('admin.service.delete', $el->id) }}"
                                                                        class="fa fa-close color-danger sweet-success-cancel"></i>
                                                                </a>
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tên</th>
                                                    <th>Loại hình</th>
                                                    <th>Chức năng</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-3 d-flex align-items-center justify-content-center">
                                    <div class="form-validation">
                                        <form class="form-valide"
                                            action="{{ isset($service) ? route('admin.service.update', $service->id) : route('admin.service.post') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method(isset($service) ? 'PUT' : 'POST')
                                            <div class="form-group row">
                                                <label class="form-label" for="name">Tên dịch vụ <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-12 p-0">
                                                    <input type="text"
                                                        class="form-control @error('name') border border-danger @enderror"
                                                        id="name"
                                                        value="{{ isset($service) ? $service->name : old('name') }}"
                                                        name="name" placeholder="Nhập tên ngôi nhà..">
                                                </div>
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label class="form-label" for="name">Loại hình <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-12 p-0">
                                                    <input type="radio" value="for_rent" id="for_rent" name="type"
                                                        placeholder="Lọai hình" checked> <label for="for_rent">Cho thuê</label>
                                                    <input type="radio" value="maintenance" id="maintenance" name="type"
                                                        placeholder="Lọai hình"> <label for="maintenance">Bảo trì</label>
                                                </div>
                                                @error('type')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
@push('js')
    <script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    <script>
        $(document).on('click', '.sweet-success-cancel', function() {
            deleteAjax($(this).data('route'), $(this).data('id'))
        });
    </script>
@endpush
