<?php
namespace App\Http\Controllers\AdminPanel;

use App\Admin;
use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller{


    public function login(Request $request)
    {
        if (!auth()->guard('admin')->check()){
            if ($request->isMethod('post')) {
                $credentials = $request->only('email', 'password');
                if (Auth::guard('admin')->attempt($credentials)) {
                    // Authentication passed...
                    return redirect()->route('admin.index');
                }
                return back()->with('error','الايميل او الباسورد خطأ');
            }
            return view('admin.login');
        }
        return redirect()->route('admin.index');
    }

    public function index()
    {
        $adminCount = Admin::all()->count();
        $categoryCount = Category::all()->count();
        $blogCount = Blog::all()->count();
        return view('admin/index',compact('adminCount','categoryCount','blogCount'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
