<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @yield('meta')
    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front') }}/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front') }}/css/bootstrap-rtl.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front') }}/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front') }}/css/style-rtl.css"/>

    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6 , #nav-aside .section-row ul li a{
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{ route('front.index') }}" title="{{ route('front.index') }}" class="logo"><img src="{{ asset('assets/front') }}/img/logo.png" style="width: 114px;height: 32.4px;" title="مدونة السينيور" alt="مدونة السينيور"></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="{{ route('front.index') }}" title="الرئيسية">الرئيسية</a></li>

                    @foreach($cats as $cat)
                            <li class="{{ $color[array_rand($color)] }}"><a href="{{ route('front.category',['id'=>$cat->id,'title'=>str_replace(' ','-',$cat->name)]) }}" title="{{ $cat->name }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <form class="search-form" action="{{ route('front.search') }}">
                        <input class="search-input" type="text" name="q" value="{{ request('q') }}" placeholder="ابحث من هنا ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </form>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="{{ route('front.index') }}">الرئيسية</a></li>
                    @foreach($cats as $key=>$cat)
                        <li class="{{ $color[array_rand($color)] }}"><a href="{{ route('front.category',['id'=>$cat->id,'title'=>str_replace(' ','-',$cat->name)]) }}" title="{{ $cat->name }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- /nav -->

            <!-- widget posts -->
            <div class="section-row">
                <h3>المقالات الاحدث</h3>
                @foreach($secondRecentBlogs as $secondRecentBlog)
                    <div class="post post-widget">
                    <a class="post-img" href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>$secondRecentBlog->title]) }}" title="{{ $secondRecentBlog->title }}"><img src="{{ asset('uploads/blogs/'.$secondRecentBlog->photo) }}" style="width: 90px;height: 54px;" title="{{ $secondRecentBlog->title }}" alt="{{ $secondRecentBlog->title }}"></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="{{ route('front.blog',["id"=>$secondRecentBlog->id,"title"=>$secondRecentBlog->title]) }}" title="{{ $secondRecentBlog->title }}">{{ $secondRecentBlog->title }}</a></h3>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /widget posts -->

            <!-- social links -->
            <div class="section-row">
                <h3>تابعنا</h3>
                <ul class="nav-aside-social">
                    <li><a href="#" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" rel="nofollow"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
</header>
<!-- /Header -->
@yield('content')
<!-- Footer -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ route('front.index') }}" class="logo"><img src="{{ asset('assets/front') }}/img/logo.png" title="مدونة السينيور" alt="مدونة السينيور"></a>
                    </div>
{{--{#                    <ul class="footer-nav">#}--}}
{{--{#                        <li><a href="#">Privacy Policy</a></li>#}--}}
{{--{#                        <li><a href="#">Advertisement</a></li>#}--}}
{{--{#                    </ul>#}--}}
                    <div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
حقوق النشر &copy;<script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة <i class="fa fa-heart-o" aria-hidden="true"></i> بواسطة <a href="http://abdelrahman-osama.epizy.com/" target="_blank">Abdelrahman osama</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">من نحن</h3>
                            <ul class="footer-links">
                                <li><a href="#" rel="nofollow">من نحن</a></li>
                                <li><a href="#" rel="nofollow">انضم الينا</a></li>
                                <li><a href="#" rel="nofollow">تواصل معنا</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">الاقسام</h3>
                            <ul class="footer-links">
                                @foreach($cats as $cat)
                                    <li><a href="{{ route('front.category',['id'=>$cat->id,'title'=>str_replace(' ','-',$cat->name)]) }}" title="{{ $cat->name }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">ارسل لي الجديد</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="ادخل بريدك الالكتروني">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" rel="nofollow"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="{{ asset('assets/front') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/front') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/front') }}/js/main.js"></script>

</body>
</html>
