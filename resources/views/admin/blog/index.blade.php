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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Tên bài viết</th>
                                            <th>Ảnh</th>
                                            <th>Số lượt xem</th>
                                            <th>Ngày đăng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $el)
                                            <tr id="tr{{ $el->id }}">
                                                <td>{{ $el->title }}</td>
                                                <td><img width="80px" src="{{ asset($el->thumbnail) }}" alt="" srcset=""></td>
                                                <td>{{ $el->viewer }}</td>
                                                <td>{{ $el->created_at->format('d-m-Y') }}</td>
                                                <td><span><a href="{{ route('admin.blog.edit', $el->id) }}"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Edit"><i
                                                                class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                        <a data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Close"><i data-id="{{ $el->id }}"
                                                                data-route="{{ route('admin.blog.delete', $el->id) }}"
                                                                class="fa fa-close color-danger sweet-success-cancel"></i></a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tên bài viết</th>
                                            <th>Ảnh</th>
                                            <th>Số lượt xem</th>
                                            <th>Ngày đăng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    {{-- @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: '{{ session('success') }}',
                icon: "success"
            });
        </script>
    @endif --}}
    <script>
        $(document).on('click', '.sweet-success-cancel', function() {
            deleteAjax($(this).data('route'), $(this).data('id'))
        });
    </script>
    {{-- contact , information , blog, bảo trì, service ( cung ứng, cho thuê) sủaw status thành service loại, thêm service , bannner show 3 house xịn đắt nhất, --}}
@endpush
