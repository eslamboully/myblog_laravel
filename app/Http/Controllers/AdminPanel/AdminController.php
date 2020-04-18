<?php
namespace App\Http\Controllers\AdminPanel;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller{
    public function index()
    {
        $rows = Admin::all();
        return view('admin/admins/index',compact('rows'));
    }

    public function create()
    {
        $cruds = ['اضف' => 'create','رؤية' => 'read','تعديل' => 'update','حذف' => 'delete'];
        $models = ['المشرفين' => 'admins','الاقسام'=> 'categories','التدوينات'=>'blogs'];
        return view('admin/admins/create',compact('cruds','models'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:admins',
            'password' => 'required',
            'description' => 'required',
            "permissions.*"  => "required|min:1",
        ]);

        if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/admins');
                $image->move($destinationPath, $name);
                $data['photo'] = $name;
        }

        $data['password'] = bcrypt($request->password);

        $admin = Admin::create($data);
        $admin->givePermissionTo($request->permissions);

        Session::flash('message', 'تمت الاضافة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.admins.index');
    }
    public function edit($id)
    {
        $cruds = ['اضف' => 'create','رؤية' => 'read','تعديل' => 'update','حذف' => 'delete'];
        $models = ['المشرفين' => 'admins','الاقسام'=> 'categories','التدوينات'=>'blogs'];
        $row = Admin::find($id);
        return view('admin/admins/edit',compact('cruds','models','row'));
    }
    public function update($id,Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:admins,id,'.$id,
            'description' => 'required',
            "permissions.*"  => "required|min:1",
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/admins');
            $image->move($destinationPath, $name);
            $data['photo'] = $name;
        }

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $admin = Admin::find($id);
        $admin->update($data);
        $admin->syncPermissions($request->permissions);

        Session::flash('message', 'تم التعديل بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.admins.index');
    }
    public function delete()
    {

    }
}
