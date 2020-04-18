@extends('admin.layouts.app')
@section('title') لوحة التحكم | الرئيسية @endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">المشرفين</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">المشرفين</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول المشرفين</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if(Session::has('message'))
                    <div class="flash-notice alert alert-success">
                            {{ Session::get('message') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>الاسم</th>
                            <th>التحكم</th>
                        </tr>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>
                                    @if(auth()->guard('admin')->user()->can('update_admins'))
                                        <a href="{{ route('admin.admins.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    @else
                                        <a href="##" class="btn btn-success btn-sm disabled"><i class="fa fa-edit"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
{{--               <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                   <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                   <li class="page-item"><a class="page-link" href="#">۱</a></li>--}}
{{--                   <li class="page-item"><a class="page-link" href="#">۲</a></li>--}}
{{--                   <li class="page-item"><a class="page-link" href="#">۳</a></li>--}}
{{--                   <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--               </ul>--}}

            </div>

        </div>
        <!-- /.card -->
    </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        var current = $('.pagination .current').text();
        $('.pagination span').addClass('page-item');
        $('.pagination span a').addClass('page-link');
        $('.pagination .current').html('<a class="page-link">' + current + '</a>');
    </script>
@endpush
