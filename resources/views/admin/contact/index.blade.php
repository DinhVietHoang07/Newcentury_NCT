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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Contact</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Contact</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Nội dung</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $el)
                                            <tr>
                                                <td>{{ $el->name }}</td>
                                                <td>{{ $el->email }}</td>
                                                <td>{{ $el->website }}</td>
                                                <td>{{ $el->message }}</td>
                                                <td><span><a href="#"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="SendMail"><i
                                                                class="fa fa-send-o color-muted m-r-5"></i> </a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Nội dung</th>
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
@endpush
