<?php
namespace App\Http\Controllers\AdminPanel;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller{

    public function index()
    {
        $rows = Category::all();
        return view('admin/categories/index',compact('rows'));
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
        ]);


        $category = Category::create($data);

        Session::flash('message', 'تمت الاضافة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.categories.index');
    }
    public function edit($id)
    {
        $row = Category::find($id);
        return view('admin/categories/edit',compact('row'));
    }
    public function update($id,Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required',
        ]);


        $category = Category::find($id);
        $category->update($data);

        Session::flash('message', 'تم التعديل بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.categories.index');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('message', 'تم الحذف بنجاح');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('admin.categories.index');
    }
}
