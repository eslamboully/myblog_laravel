@extends('front.layouts.app')
@section('title') السنيور | {{ $category->name }} @endsection

@section('meta')
    <meta name="description" content="{{ $category->name }}">
    <meta name="keywords" content="{{ $category->name }}">
    <meta name="title" content="{{ $category->name }}">
    <meta charset="utf-8"/>
    <meta name="author" content="abdelrahman osama ahmed aleslamboully" />
    <meta name="copyright" content="abdelrahman osama" />

@endsection

@section('content')

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{ route('front.index') }}" title="الرئيسية">الرئيسية</a></li>
                        <li>{{ $category->name }}</li>
                    </ul>
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-thumb">
                                <!-- style="width: 750px;height: 450px" -->
                                <a class="post-img" href="{{ route('front.blog',["id"=>$recentBlog->id,"title"=>str_replace(' ','-',$recentBlog->title)]) }}" title="{{ $recentBlog->title }}"><img src="{{ asset('uploads/blogs/'.$recentBlog->photo) }}" title="{{ $recentBlog->title }}" alt="{{ $recentBlog->title }}"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category {{ $color[array_rand($color)] }}" href="{{ route('front.category',["id"=>$recentBlog->category->id,"title"=>str_replace(' ','-',$recentBlog->category->name)]) }}" title="{{ $recentBlog->category->name }}">{{ $recentBlog->category->name }}</a>
                                        <span class="post-date">{{ $recentBlog->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$recentBlog->id,"title"=>str_replace(' ','-',$recentBlog->title)]) }}" title="{{ $recentBlog->title }}">{{ $recentBlog->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->


                    @foreach($secondRecentBlogs as $secondRecentBlog)
                        <!-- post -->
                            <div class="col-md-6">
                                <div class="post">
                                    <!-- style="width: 360px;height: 216px;" -->
                                    <a class="post-img" title="{{ $secondRecentBlog->title }}" href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>str_replace(' ','-',$secondRecentBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$secondRecentBlog->photo) }}"  title="{{ $secondRecentBlog->title }}" alt="{{ $secondRecentBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $secondRecentBlog->category->name }}" href="{{ route('front.category',["id"=>$secondRecentBlog->category->id,"title"=>$secondRecentBlog->category->name]) }}" title="{{ $secondRecentBlog->category->name }}">{{ $secondRecentBlog->category->name }}</a>
                                            <span class="post-date">{{ $secondRecentBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>str_replace(' ','-',$secondRecentBlog->title)]) }}" title="{{ $secondRecentBlog->category->name }}">{{ $secondRecentBlog->title }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                        @endforeach

                        <div class="clearfix visible-md visible-lg"></div>

                        <!-- ad -->
                        <div class="col-md-12">
                            <div class="section-row">
                                <a href="#">
                                    <img class="img-responsive center-block" src="{{ asset('assets/front') }}/img/ad-2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- ad -->


                        @foreach($secondMostWatchBlogs as $secondMostWatchBlog)
                            <!-- post -->
                            <div class="col-md-12">
                                <div class="post post-row">
                                    <!--  style="width: 90px;height: 54px;" -->
                                    <a class="post-img" href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>$secondMostWatchBlog->title]) }}" title="{{ $secondMostWatchBlog->title }}"><img src="{{ asset('uploads/blogs/'.$secondMostWatchBlog->photo) }}" title="{{ $secondMostWatchBlog->title }}" alt="{{ $secondMostWatchBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ $color[array_rand($color)] }}" href="{{ route('front.category',["id"=>$secondMostWatchBlog->category->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->category->name)]) }}" title="{{ $secondMostWatchBlog->category->name }}">{{ $secondMostWatchBlog->category->name }}</a>
                                            <span class="post-date">{{ $secondMostWatchBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>$secondMostWatchBlog->title]) }}" title="{{ $secondMostWatchBlog->title }}">{{ $secondMostWatchBlog->title }}</a></h3>
                                        <p>{{ \Illuminate\Support\Str::limit($secondMostWatchBlog->description,80) }}...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                            @endforeach

                        <div class="col-md-12">
                            <div class="section-row">
                                <button class="primary-button center-block">رؤية المزيد</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/front') }}/img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>الاكثر مشاهدة</h2>
                        </div>

                        @foreach($mostWatchBlogs as $mostWatchBlog)
                            <div class="post post-widget">
                                <!-- style="width: 90px;height: 54px;" -->
                                <a class="post-img" href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>$mostWatchBlog->title]) }}" title="{{ $mostWatchBlog->title }}"><img src="{{ asset('uploads/blogs/'.$mostWatchBlog->photo) }}"  title="{{ $mostWatchBlog->title }}" alt="{{ $mostWatchBlog->title }}"></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>$mostWatchBlog->title]) }}" title="{{ $mostWatchBlog->title }}">{{ $mostWatchBlog->title }}</a></h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /post widget -->

                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>الاقسام</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                @foreach($cats as $cat)
                                    <li class="{{ $color[array_rand($color)] }}"><a href="{{ route('front.category',['id'=>$cat->id,'title'=>str_replace(' ','-',$cat->name)]) }}" title="{{ $cat->name }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /catagories -->

                    <!-- tags -->
{{--{#                    <div class="aside-widget">#}--}}
{{--{#                        <div class="tags-widget">#}--}}
{{--{#                            <ul>#}--}}
{{--{#                                <li><a href="#">Chrome</a></li>#}--}}
{{--{#                                <li><a href="#">CSS</a></li>#}--}}
{{--{#                                <li><a href="#">Tutorial</a></li>#}--}}
{{--{#                                <li><a href="#">Backend</a></li>#}--}}
{{--{#                                <li><a href="#">JQuery</a></li>#}--}}
{{--{#                                <li><a href="#">Design</a></li>#}--}}
{{--{#                                <li><a href="#">Development</a></li>#}--}}
{{--{#                                <li><a href="#">JavaScript</a></li>#}--}}
{{--{#                                <li><a href="#">Website</a></li>#}--}}
{{--{#                            </ul>#}--}}
{{--{#                        </div>#}--}}
{{--{#                    </div>#}--}}
                    <!-- /tags -->

                    <!-- archive -->
{{--{#                    <div class="aside-widget">#}--}}
{{--{#                        <div class="section-title">#}--}}
{{--{#                            <h2>Archive</h2>#}--}}
{{--{#                        </div>#}--}}
{{--{#                        <div class="archive-widget">#}--}}
{{--{#                            <ul>#}--}}
{{--{#                                <li><a href="#">Jan 2018</a></li>#}--}}
{{--{#                                <li><a href="#">Feb 2018</a></li>#}--}}
{{--{#                                <li><a href="#">Mar 2018</a></li>#}--}}
{{--{#                            </ul>#}--}}
{{--{#                        </div>#}--}}
{{--{#                    </div>#}--}}
                    <!-- /archive -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection
