@extends('front.layouts.app')
@section('title') مدونة السنيور للمعلومات | الرئيسية @endsection

@section('meta')
    <meta name="description" content="موقع ويب شامل ينشر مقالات باللغة العربية تهدف المدونة لزيادة المحتوي العربي وتقديم مواضيع مختلفة في شتي مواضيع الحياة رياضة وعلوم وبرمجة وتكنولوجيا ومقالات عامة">
    <meta name="keywords" content="السينيور , مدونة , البرمجة , التعليم , الاخبار , السنيور ">
    <meta name="title" content="مدونة السينيور للمعلومات">
    <meta charset="utf-8"/>
    <meta name="author" content="abdelrahman osama ahmed aleslamboully" />
    <meta name="copyright" content="abdelrahman osama" />

@endsection

@section('content')
    <!-- section -->
    @php $color = ['cat-1','cat-2','cat-3','cat-4']; @endphp
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- /post -->

                    @if($blogs->count() > 0)
                            @foreach($blogs as $blog)
                                <!-- post -->
                                <div class="col-md-4">
                                    <div class="post">
                                        <!-- style="width: 360px;height: 216px;" -->
                                        <a class="post-img" title="{{ $blog->title }}" href="{{ route('front.blog',["id"=>$blog->id,"title"=>str_replace(' ','-',$blog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$blog->photo) }}" title="{{ $blog->title }}" alt="{{ $blog->title }}"></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $blog->category->name }}" href="{{ route('front.category',["id"=>$blog->category->id,"title"=>$blog->category->name]) }}" title="{{ $blog->category->name }}">{{ $blog->category->name }}</a>
                                                <span class="post-date">{{ $blog->created_at->diffForHumans() }}</span>
                                            </div>
                                            <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$blog->id,"title"=>str_replace(' ','-',$blog->title)]) }}" title="{{ $blog->category->name }}">{{ $blog->title }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            <!-- /post -->
                            @endforeach
                    @else
                        <h3>للاسف لا يوجد تدوينات لهذا العنوان</h3>
                    @endif
                        <div class="clearfix visible-md visible-lg"></div>

                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
