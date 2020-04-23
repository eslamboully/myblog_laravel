<?php
namespace App\Http\Controllers\AdminPanel;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller{
    public function index()
    {
        if (auth()->guard('admin')->user()->id == 1):
            $rows = Blog::with(['category','admin'])->orderBy('id','desc')->get();
        else:
            $rows = Blog::with(['category','admin'])->where('admin_id',auth()->guard('admin')->user()->id)->orderBy('id','desc')->get();
        endif;
        return view('admin/blogs/index',compact('rows'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin/blogs/create',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/blogs');
                $image->move($destinationPath, $name);
                $data['photo'] = $name;
        }

        $data['admin_id'] = auth()->guard('admin')->user()->id;
        $blog = Blog::create($data);

        Session::flash('message', 'تمت الاضافة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.blogs.index');
    }
    public function edit($id)
    {
        $row = Blog::find($id);
        $categories = Category::all();
        return view('admin/blogs/edit',compact('categories','row'));
    }
    public function update($id,Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/blogs');
            $image->move($destinationPath, $name);
            $data['photo'] = $name;
        }

        $blog = Blog::find($id);
        $blog->update($data);

        Session::flash('message', 'تم التعديل بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.blogs.index');
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        Session::flash('message', 'تم الحذف بنجاح');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('admin.blogs.index');
    }
}
