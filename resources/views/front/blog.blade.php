@extends('front.layouts.app')
@section('title') السنيور | {{ $blog->title }} @endsection
@section('meta')
    <meta name="description" content="{{ strip_tags(\Illuminate\Support\Str::limit($blog->description,100)) }}">
    <meta name="keywords" content="{{ $blog->keyword }}">
    <meta name="title" content="{{ $blog->title }}">
    <meta charset="utf-8"/>
    <meta name="author" content="abdelrahman osama ahmed aleslamboully" />
    <meta name="copyright" content="abdelrahman osama" />

@endsection
@section('content')
    <!-- Page Header -->
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('{{ asset('uploads/blogs/'.$blog->photo) }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="{{ route('front.category',["id"=>$blog->category->id,"title"=>str_replace(' ','-',$blog->category->name)]) }}" title="{{ $blog->category->name }}">{{ $blog->category->name }}</a>
                        <span class="post-date">{{ $blog->created_at->diffForHumans() }}</span>
                    </div>
                    <h1>{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Post content -->
                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        <div class="main-post">
                            {!! $blog->description !!}
                        </div>
                        <div class="post-shares sticky-shares">

                            <script src="https://apps.elfsight.com/p/platform.js"  defer></script>
                            <div class="elfsight-app-fd8de85c-f4e7-46cd-8b6c-0679bee92ad9"></div>
                        </div>
                    </div>


                    <!-- ad -->
                    <div class="section-row text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/front') }}/img/ad-2.jpg" alt="">
                        </a>
                    </div>
                    <!-- ad -->

                    <!-- author -->
                    <div class="section-row">
                        <div class="post-author">
                            <div class="media">
                                <div class="media-left">
                                    @if($blog->admin->photo)
                                        <img class="media-object" src="{{ asset('uploads/admins/'.$blog->admin->photo) }}" style="width: 120px;height: 120px;" title="{{ $blog->admin->name }}" alt="{{ $blog->admin->name }}">
                                    @else
                                        <img class="media-object" src="{{ asset('assets/admin/images') }}/profile.png" style="width: 120px;height: 120px;" title="{{ $blog->admin->name }}" alt="{{ $blog->admin->name }}">
                                    @endif
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>{{ $blog->admin->name }}</h3>
                                    </div>
                                    <p>{{ $blog->admin->description }}</p>
                                    <ul class="author-social">
                                        <li><a href="#" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /author -->


                    <div id="disqus_thread"></div>
                    <script>

                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://senior-2.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
                <!-- aside -->
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
                            <h2>المقالات الاحدث</h2>
                        </div>

                        @foreach($secondRecentBlogs as $secondRecentBlog)
                            <div class="post post-widget">
                                <!-- style="width: 90px;height: 54px;" -->
                                <a class="post-img" href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>$secondRecentBlog->title]) }}" title="{{ $secondRecentBlog->title }}"><img src="{{ asset('uploads/blogs/'.$secondRecentBlog->photo) }}"  title="{{ $secondRecentBlog->title }}" alt="{{ $secondRecentBlog->title }}"></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>$secondRecentBlog->title]) }}" title="{{ $secondRecentBlog->title }}">{{ $secondRecentBlog->title }}</a></h3>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- /post widget -->

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

                    <!-- /archive -->
                </div>

                <!-- tags -->
                                <div class="aside-widget">
                                    <div class="tags-widget">
                                        <ul>
                                            @foreach(explode(',',$blog->keyword) as $keyword)
                                            <li><a href="{{ route('front.search',['q' => $keyword]) }}">{{ $keyword }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
            <!-- /tags -->
                <!-- /aside -->
        <!-- /container -->
            </div>
        </div>
    </div>
    <!-- /section -->
@endsection

@push('js')
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://senior-2.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@endpush
