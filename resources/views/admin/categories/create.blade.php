@extends('admin.layouts.app')
@section('title') الاقسام | اضافة @endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">الاقسام</a></li>
                        <li class="breadcrumb-item active">اضافة</li>
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
                <h3 class="card-title">اضف قسم</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" class="form-control" required id="name">
                            </div>
                            <button class="btn btn-success sm"><i class="fa fa-add"></i> اضف</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
            </div>
        </div>
    </section>

@endsection
