<?php
namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller {

    public function index()
    {
        $cats = Category::with(['blogs'])->get();
        $recentBlog = Blog::with(['category','admin'])->orderBy('id','desc')->first();
        $secondRecentBlogs = Blog::with(['category','admin'])
            ->where('id', '!=', $recentBlog->id)
            ->orderBy('id','desc')
            ->limit(2)
            ->get();
        $thirdRecentBlogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->skip(3)->limit(2)->get();
        $forthRecentBlogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->skip(5)
            ->limit(2)
            ->get();
        $mostWatchBlogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->skip(7)
            ->limit(4)
            ->get();
        $secondMostWatchBlogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->skip(8)
            ->limit(4)
            ->get();
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

    public function search(Request $request)
    {
        $cats = Category::with(['blogs'])->get();

        $blogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->where('title','like','%'.$request->q.'%')
            ->orWhere('keyword','like','%'.$request->q.'%')
            ->get();

        $color = ['cat-1','cat-2','cat-3','cat-4'];

        $secondRecentBlogs = Blog::with(['category','admin'])
            ->orderBy('id','desc')
            ->skip(1)->limit(2)->get();

        return view('front/search',
            compact('cats',
                'blogs',
                'color',
                'secondRecentBlogs'
            ));
    }

    public function category($id,$title)
    {
        $cats = Category::with(['blogs'])->get();
        $category = Category::find($id);
        $recentBlog = Blog::with(['category','admin'])
            ->where('category_id','=',$category->id)
            ->orderBy('id','desc')->first();

        $secondRecentBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$category->id)
            ->orderBy('id','desc')
            ->skip(1)->limit(2)->get();

        $secondMostWatchBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$category->id)
            ->orderBy('id','desc')
            ->skip(3)->limit(4)->get();

        $mostWatchBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$category->id)
            ->orderBy('id','desc')
            ->skip(7)->limit(4)->get();
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
        $secondRecentBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$blog->category_id)
            ->orderBy('id','desc')
            ->skip(1)->limit(2)->get();
        $secondMostWatchBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$blog->category_id)
            ->orderBy('id','desc')
            ->skip(3)->limit(4)->get();
        $mostWatchBlogs = Blog::with(['category','admin'])
            ->where('category_id','=',$blog->category_id)
            ->orderBy('id','desc')
            ->skip(7)->limit(4)->get();
        $recentBlog = Blog::with(['category','admin'])
            ->where('category_id','=',$blog->category->id)
            ->orderBy('id','desc')->first();
        $color = ['cat-1','cat-2','cat-3','cat-4'];

        return view('front/blog',
            compact('cats',
                'color',
                'recentBlog',
                'blog',
                'secondRecentBlogs',
                'mostWatchBlogs',
                'secondMostWatchBlogs'
            ));
    }
}
