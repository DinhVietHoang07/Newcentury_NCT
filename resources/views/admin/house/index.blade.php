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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">House</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nhà</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Tên căn nhà</th>
                                            <th>Địa chỉ</th>
                                            <th>Số phòng ngủ</th>
                                            <th>Diện tích phòng ngủ (m<sup>2</sup>)</th>
                                            <th>Diện tích căn nhà (m<sup>2</sup>)</th>
                                            <th>Giá (VNĐ)</th>
                                            <th>Loại dịch vụ</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $el)
                                            @if ($el->service->slug == 'cho-thue' || $el->service->slug == 'chuyen-nhuong')
                                                <tr id="tr{{ $el->id }}">
                                                    <td>{{ $el->house_name }}</td>
                                                    <td>{{ isset($el->address) ? $el->address : '~~~' }}</td>
                                                    <td>{{ isset($el->number_of_bedrooms) ? $el->number_of_bedrooms : '~~~' }}
                                                    </td>
                                                    <td>{{ isset($el->area_bedrooms) ? $el->area_bedrooms : '~~~' }}</td>
                                                    <td>{{ isset($el->area) ? $el->area : '~~~' }}</td>
                                                    <td>{{ isset($el->rent_price) ? number_format($el->rent_price) : number_format($el->option->price_room_month) }}
                                                    </td>
                                                    <td>{{ $el->service->name }}</td>
                                                    <td><span><a href="{{ route('admin.house.edit', $el->id) }}"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Close"><i
                                                                    data-id="{{ $el->id }}"
                                                                    data-route="{{ route('admin.house.delete', $el->id) }}"
                                                                    class="fa fa-close color-danger sweet-success-cancel"></i></a></span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tên căn nhà</th>
                                            <th>Địa chỉ</th>
                                            <th>Số phòng ngủ</th>
                                            <th>Diện tích phòng ngủ (m<sup>2</sup>)</th>
                                            <th>Diện tích căn (m<sup>2</sup>)</th>
                                            <th>Giá (VNĐ)</th>
                                            <th>Loại dịch vụ</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảo trì</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Loại dịch vụ</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $el)
                                            @if ($el->service->slug == 'bao-tri' || $el->service->slug == 'xu-ly-tham-ngam')
                                                <tr id="tr{{ $el->id }}">
                                                    <td>{{ $el->house_name }}</td>
                                                    <td>{{ $el->service->name }}</td>
                                                    <td><span><a href="{{ route('admin.house.edit', $el->id) }}"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Edit"><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                            <a data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Close"><i
                                                                    data-id="{{ $el->id }}"
                                                                    data-route="{{ route('admin.house.delete', $el->id) }}"
                                                                    class="fa fa-close color-danger sweet-success-cancel"></i></a></span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Loại dịch vụ</th>
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
