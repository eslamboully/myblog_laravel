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
                <div class="col-md-8">
                    <div class="row">
                        <!-- post -->
                        <div class="col-md-12">
                            <h2>الرئيسية</h2>
                            <div class="post post-thumb">
                                <!-- style="width: 750px;height: 450px;" -->
                                <a class="post-img" href="{{ route('front.blog',["id"=>$recentBlog->id,"title"=>str_replace(' ','-',$recentBlog->title)]) }}" title="{{ $recentBlog->title }}"><img src="{{ asset('uploads/blogs/'.$recentBlog->photo) }}" title="{{ $recentBlog->title }}" alt="{{ $recentBlog->title }}"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category {{ $color[array_rand($color)] }}" href="{{ route('front.category',["id"=>$recentBlog->category->id,"title"=>str_replace(' ','-',$recentBlog->category->name)]) }}" title="{{ $recentBlog->title }}">{{ $recentBlog->category->name }}</a>
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
                                    <a class="post-img" title="{{ $secondRecentBlog->title }}" href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>str_replace(' ','-',$secondRecentBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$secondRecentBlog->photo) }}" title="{{ $secondRecentBlog->title }}" alt="{{ $secondRecentBlog->title }}"></a>
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

                        @foreach($thirdRecentBlogs as $thirdRecentBlog)
                            <!-- post -->
                            <div class="col-md-6">
                                <div class="post">
                                    <!-- style="width: 360px;height: 216px;" -->
                                    <a class="post-img" title="{{ $thirdRecentBlog->title }}" href="{{ route('front.blog',["id"=>$thirdRecentBlog->id,"title"=>str_replace(' ','-',$thirdRecentBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$thirdRecentBlog->photo) }}" title="{{ $thirdRecentBlog->title }}" alt="{{ $thirdRecentBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $thirdRecentBlog->category->name }}" href="{{ route('front.category',["id"=>$thirdRecentBlog->category->id,"title"=>$thirdRecentBlog->category->name]) }}" title="{{ $thirdRecentBlog->category->name }}">{{ $thirdRecentBlog->category->name }}</a>
                                            <span class="post-date">{{ $thirdRecentBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$thirdRecentBlog->id,"title"=>str_replace(' ','-',$thirdRecentBlog->title)]) }}" title="{{ $thirdRecentBlog->category->name }}">{{ $thirdRecentBlog->title }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                        @endforeach
                        <div class="clearfix visible-md visible-lg"></div>

                        @foreach($forthRecentBlogs as $forthRecentBlog)
                        <!-- post -->
                            <div class="col-md-6">
                                <div class="post">
                                    <!-- style="width: 360px;height: 216px;" -->
                                    <a class="post-img" title="{{ $forthRecentBlog->title }}" href="{{ route('front.blog',["id"=>$forthRecentBlog->id,"title"=>str_replace(' ','-',$forthRecentBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$forthRecentBlog->photo) }}" title="{{ $forthRecentBlog->title }}" alt="{{ $forthRecentBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $forthRecentBlog->category->name }}" href="{{ route('front.category',["id"=>$forthRecentBlog->category->id,"title"=>$forthRecentBlog->category->name]) }}" title="{{ $forthRecentBlog->category->name }}">{{ $forthRecentBlog->category->name }}</a>
                                            <span class="post-date">{{ $forthRecentBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$forthRecentBlog->id,"title"=>str_replace(' ','-',$forthRecentBlog->title)]) }}" title="{{ $forthRecentBlog->category->name }}">{{ $forthRecentBlog->title }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                        @endforeach

                        <div class="clearfix visible-md visible-lg"></div>

                        @foreach($mostWatchBlogs as $mostWatchBlog)
                        <!-- post -->
                            <div class="col-md-6">
                                <div class="post">
                                    <!-- style="width: 360px;height: 216px;" -->
                                    <a class="post-img" title="{{ $mostWatchBlog->title }}" href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>str_replace(' ','-',$mostWatchBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$mostWatchBlog->photo) }}" title="{{ $mostWatchBlog->title }}" alt="{{ $mostWatchBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $mostWatchBlog->category->name }}" href="{{ route('front.category',["id"=>$mostWatchBlog->category->id,"title"=>$mostWatchBlog->category->name]) }}" title="{{ $mostWatchBlog->category->name }}">{{ $mostWatchBlog->category->name }}</a>
                                            <span class="post-date">{{ $mostWatchBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>str_replace(' ','-',$mostWatchBlog->title)]) }}" title="{{ $mostWatchBlog->category->name }}">{{ $mostWatchBlog->title }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                        @endforeach

                        <div class="clearfix visible-md visible-lg"></div>

{{--                        @foreach($secondMostWatchBlogs as $secondMostWatchBlog)--}}
{{--                        <!-- post -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="post">--}}
{{--                                    <a class="post-img" title="{{ $secondMostWatchBlog->title }}" href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$secondMostWatchBlog->photo) }}" style="width: 360px;height: 216px;" title="{{ $secondMostWatchBlog->title }}" alt="{{ $secondMostWatchBlog->title }}"></a>--}}
{{--                                    <div class="post-body">--}}
{{--                                        <div class="post-meta">--}}
{{--                                            <a class="post-category {{ $color[array_rand($color)] }}" title="{{ $secondMostWatchBlog->category->name }}" href="{{ route('front.category',["id"=>$secondMostWatchBlog->category->id,"title"=>$secondMostWatchBlog->category->name]) }}" title="{{ $secondMostWatchBlog->category->name }}">{{ $secondMostWatchBlog->category->name }}</a>--}}
{{--                                            <span class="post-date">{{ $secondMostWatchBlog->created_at->diffForHumans() }}</span>--}}
{{--                                        </div>--}}
{{--                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->title)]) }}" title="{{ $secondMostWatchBlog->category->name }}">{{ $secondMostWatchBlog->title }}</a></h3>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /post -->--}}
{{--                        @endforeach--}}

                    </div>
                </div>

                <div class="col-md-4">
                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>الاكثر مشاهدة</h2>
                        </div>

                        @foreach($mostWatchBlogs as $mostWatchBlog)
                            <div class="post post-widget">
                                <!-- style="width: 90px;height: 60px;"  -->
                                <a class="post-img" title="{{ $mostWatchBlog->title }}" href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>str_replace(' ','-',$mostWatchBlog->title)]) }}"><img src="{{ asset('uploads/blogs/'.$mostWatchBlog->photo) }}" title="{{ $mostWatchBlog->title }}" alt="{{ $mostWatchBlog->title }}"></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$mostWatchBlog->id,"title"=>str_replace(' ','-',$mostWatchBlog->title)]) }}" title="{{ $mostWatchBlog->category->name }}">{{ $mostWatchBlog->title }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /post widget -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>التدوينات المميزة</h2>
                        </div>
                        @foreach($secondMostWatchBlogs as $secondMostWatchBlog)
                        <div class="post post-thumb">
                            <!--  style="width: 360px;height: 240px;" -->
                            <a class="post-img" href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>$secondMostWatchBlog->title]) }}" title="{{ $secondMostWatchBlog->title }}"><img src="{{ asset('uploads/blogs/'.$secondMostWatchBlog->photo) }}" title="{{ $secondMostWatchBlog->title }}" alt="{{ $secondMostWatchBlog->title }}"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category {{ $color[array_rand($color)] }}" href="{{ route('front.category',["id"=>$secondMostWatchBlog->category->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->category->name)]) }}" title="{{ $secondMostWatchBlog->category->name }}">{{ $secondMostWatchBlog->category->name }}</a>
                                    <span class="post-date">{{ $secondMostWatchBlog->created_at->diffForHumans() }}</span>
                                </div>
                                <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>$secondMostWatchBlog->title]) }}" title="{{ $secondMostWatchBlog->title }}">{{ $secondMostWatchBlog->title }}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /post widget -->

                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/front') }}/img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>الاكثر قراءة</h2>
                            </div>
                        </div>

                        @foreach($secondMostWatchBlogs as $secondMostWatchBlog)
                        <!-- post -->
                            <div class="col-md-12">
                                <div class="post post-row">
                                    <!-- style="width: 300px;height: 180px"  -->
                                    <a class="post-img" href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->title)]) }}" title="{{ $secondMostWatchBlog->title }}"><img src="{{ asset('/uploads/blogs/'.$secondMostWatchBlog->photo) }}" title="{{ $secondMostWatchBlog->title }}" alt="{{ $secondMostWatchBlog->title }}"></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category {{ array_rand($color) }}" href="{{ route('front.category',["id"=>$secondMostWatchBlog->category->id,"title"=>$secondMostWatchBlog->category->name]) }}" title="{{ $secondMostWatchBlog->category->name }}">{{ $secondMostWatchBlog->category->name }}</a>
                                            <span class="post-date">{{ $secondMostWatchBlog->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondMostWatchBlog->id,"title"=>str_replace(' ','-',$secondMostWatchBlog->title)]) }}" title="{{ $secondMostWatchBlog->title }}">{{ $secondMostWatchBlog->title }}</a></h3>
                                        <p>{{ strip_tags(\Illuminate\Support\Str::limit($secondMostWatchBlog->description,100)) }}</p>
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

                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>الاقسام</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                @foreach($cats as $cat)
                                <li><a href="{{ route('front.category',['id'=>$cat->id,'title'=>str_replace(' ','-',$cat->name)]) }}" title="{{ $cat->name }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /catagories -->

                    <!-- tags -->
{{--                    <div class="aside-widget">--}}
{{--                        <div class="tags-widget">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Chrome</a></li>--}}
{{--                                <li><a href="#">CSS</a></li>--}}
{{--                                <li><a href="#">Tutorial</a></li>--}}
{{--                                <li><a href="#">Backend</a></li>--}}
{{--                                <li><a href="#">JQuery</a></li>--}}
{{--                                <li><a href="#">Design</a></li>--}}
{{--                                <li><a href="#">Development</a></li>--}}
{{--                                <li><a href="#">JavaScript</a></li>--}}
{{--                                <li><a href="#">Website</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /tags -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
