<?php
namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Blog;
use App\Category;

class FrontController extends Controller {

    public function index()
    {
        $cats = Category::with(['blogs'])->get();
        $recentBlog = Blog::with(['category','admin'])->orderBy('id','desc')->first();
        $secondRecentBlogs = Blog::with(['category','admin'])->skip(1)->limit(2)->get();
        $thirdRecentBlogs = Blog::with(['category','admin'])->skip(3)->limit(2)->get();
        $forthRecentBlogs = Blog::with(['category','admin'])->skip(5)->limit(2)->get();
        $mostWatchBlogs = Blog::with(['category','admin'])->skip(7)->limit(4)->get();
        $secondMostWatchBlogs = Blog::with(['category','admin'])->skip(8)->limit(4)->get();
        $color = ['cat-1','cat-2','cat-3','cat-4'];

        return view('front/index',
            compact('cats',
                'recentBlog',
                'color',
                'secondRecentBlogs',
                'thirdRecentBlogs',
                'forthRecentBlogs',
                'mostWatchBlogs',
                'secondMostWatchBlogs'
            ));
    }

    public function category($id,$title)
    {
        $cats = Category::with(['blogs'])->get();
        $category = Category::find($id);
        $secondRecentBlogs = Blog::with(['category','admin'])->skip(1)->limit(2)->get();
        $secondMostWatchBlogs = Blog::with(['category','admin'])->skip(8)->limit(4)->get();
        $mostWatchBlogs = Blog::with(['category','admin'])->skip(7)->limit(4)->get();
        $recentBlog = Blog::with(['category','admin'])->orderBy('id','desc')->first();
        $color = ['cat-1','cat-2','cat-3','cat-4'];

        return view('front/category',
            compact('cats',
                'category',
                'color',
                'recentBlog',
                'secondRecentBlogs',
                'mostWatchBlogs',
                'secondMostWatchBlogs'
            ));
    }

    public function blog($id,$title)
    {
        $cats = Category::with(['blogs'])->get();
        $blog = Blog::find($id);
        $secondRecentBlogs = Blog::with(['category','admin'])->skip(1)->limit(2)->get();
        $secondMostWatchBlogs = Blog::with(['category','admin'])->skip(8)->limit(4)->get();
        $mostWatchBlogs = Blog::with(['category','admin'])->skip(7)->limit(4)->get();
        $recentBlog = Blog::with(['category','admin'])->orderBy('id','desc')->first();
        $color = ['cat-1','cat-2','cat-3','cat-4'];

        return view('front/blog',
            compact('cats',
                'color',
                'blog',
                'recentBlog',
                'secondRecentBlogs',
                'mostWatchBlogs',
                'secondMostWatchBlogs'
            ));
    }
}
