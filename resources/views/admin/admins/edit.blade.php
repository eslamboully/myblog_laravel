@extends('admin.layouts.app')
@section('title') المشرفين | تعديل @endsection
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">المشرفين</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
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
                            <h3 class="card-title">تعديل المشرف</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.admins.update',$row->id) }}" method="post" enctype="multipart/form-data">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">الاسم</label>
                                            <input type="text" name="name" class="form-control" value="{{ $row->name }}" required id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">البريد الالكتروني</label>
                                            <input type="email" name="email" class="form-control" value="{{ $row->email }}" required id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">الباسورد</label>
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">نبذة</label>
                                        <textarea name="description" class="form-control" id="description">{{ $row->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الصورة الشخصية</label>
                                        <input type='file' id="imgInp" name="photo" hidden/>
                                        @if($row->photo == null)
                                            <img id="blah" src="{{ asset('assets/admin/images/profile.png') }}" style="width: 70px;height: 70px;border-radius: 35px;" alt="your image" />
                                        @else
                                            <img id="blah" src="{{ asset('uploads/admins/'.$row->photo) }}" style="width: 70px;height: 70px;border-radius: 35px;" alt="your image" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- Custom Tabs -->
                                    <div class="card">
                                        <div class="card-header d-flex p-0">
                                            <h3 class="card-title p-3">الصلاحيات</h3>
                                            <ul class="nav nav-pills ml-auto p-2">
                                                @foreach($models as $key=>$model)
                                                    <li class="nav-item"><a class="nav-link {{ $loop->first ? 'active show' : '' }}" href="#{{ $model }}" data-toggle="tab">{{ $key }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                @foreach($models as $key=>$model)
                                                    <div class="tab-pane {{ $loop->first ? 'active show' : '' }}" id="{{ $model }}">

                                                        @foreach($cruds as $key=>$crud)
                                                            <input type="checkbox" name="permissions[]" {{ $row->can($crud.'_'.$model) ? 'checked' : '' }} value="{{ $crud }}_{{ $model }}">
                                                            <label>{{ $key }}</label>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- ./card -->
                                    </div>
                                </div>
                                <button class="btn btn-success sm"><i class="fa fa-edit"></i> تعديل</button>
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

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
        $("#blah").on('click',function () {
            $("#imgInp").click();
        });
    </script>
@endpush
