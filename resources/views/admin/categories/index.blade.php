@extends('admin.layouts.app')
@section('title') الاقسام | عرض @endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الاقسام</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">الاقسام</li>
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

            <!-- /.card-header -->
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="flash-notice alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if($rows->count() > 0)
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
                                            <form action="{{ route('admin.categories.destroy',$row->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @if(auth()->guard('admin')->user()->can('update_categories'))
                                                    <a href="{{ route('admin.categories.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                @else
                                                    <a href="##" class="btn btn-success btn-sm disabled"><i class="fa fa-edit"></i></a>
                                                @endif
                                                @if(auth()->guard('admin')->user()->can('delete_categories'))
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-trash"></i></button>
                                                @else
                                                    <a href="##" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>مفيش اقسام</h1>
                    @if(auth()->guard('admin')->user()->can('create_categories'))
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ضيف اقسام من هنا</a>
                    @else
                        <a href="" class="btn btn-warning disabled"><i class="fa fa-plus"></i> ضيف اقسام من هنا</a>
                    @endif
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

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
