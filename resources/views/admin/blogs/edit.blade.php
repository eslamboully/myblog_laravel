@extends('admin.layouts.app')
@section('title') التدوينات | تعديل @endsection
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">التدوينات</a></li>
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
                            <h3 class="card-title">تعديل التدوينة</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.blogs.update',$row->id) }}" method="post" enctype="multipart/form-data">
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
                                    <div class="col-md-12">
                                        <div>
                                            <label for="">العنوان</label>
                                            <input type="text" class="form-control" name="title" value="{{ $row->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="">التدوينة</label>
                                            <textarea name="description" id="" class="form-control ckeditor" cols="30" rows="10">{{ $row->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">الصورة</label>
                                        <br>
                                        <input type="file" id="imgInp" name="photo" hidden="hidden">
                                        @if($row->photo == null)
                                            <img id="blah" src="{{ asset('assets/admin/images/profile.png') }}" style="width: 70px;height: 70px;border-radius: 35px;" alt="your image" />
                                        @else
                                            <img id="blah" src="{{ asset('uploads/blogs/'.$row->photo) }}" style="width: 70px;height: 70px;border-radius: 35px;" alt="your image" />
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="">الكلمات الدلالية</label>
                                            <input type="text" class="form-control" name="keyword" value="{{ $row->keyword }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label for="">اختر القسم</label>
                                            <select name="category_id" class="form-control">
                                                <option value="">اختر القسم</option>
                                                @foreach($categories as $category)
                                                    <option {{ $row->category_id == $category->id ? 'selected=selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.js-datepicker').datepicker();
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css">
@endpush
