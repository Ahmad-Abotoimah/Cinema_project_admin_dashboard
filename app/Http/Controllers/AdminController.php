<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all();
        return view('admin-dashboard.manage_admins',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.manage_admins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'admin_name'=>'required|max:250',
            'admin_email'=>'required|max:250',
            'admin_password'=>'required|max:250',
            'admin_number'=>'required|max:250',
            'admin_image'=>'required|mimes:jpeg,png,gif,jpg',
            'admin_token'=>'required|max:2500',
            'admin_role'=>'required|max:2500',
          ]);
          if ($request->hasFile('admin_image')) {
            $file = $request->admin_image;
            $new_file = time().$file->getClientOriginalName();
            $file->move('storage/admin_image/', $new_file);
        }

        Admin::create([
            "admin_name" => $request->admin_name,
            "admin_email" => $request->admin_email,
            "admin_number" => $request->admin_number,
            "admin_token" => $request->admin_token,
            "admin_role" => $request->admin_role,
            "admin_image" => 'storage/admin_image/' . $new_file,
            "admin_password"=> Hash::make ($request->admin_password) ,


        ]);
        return redirect()->back();
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::find($id);
        return view('admin-dashboard.updates.admin_update',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $admin=Admin::find($id);

        if($request->hasFile('admin_image')){
            $file=$request->admin_image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/admin_image/',$new_file);
            $admin->admin_image='storage/admin_image/'.$new_file;
        }

        $admin->admin_name=$request->admin_name;
        $admin->admin_email=$request->admin_email;
        $admin->admin_password=$request->admin_password;
        $admin->admin_number=$request->admin_number;
        $admin->admin_token=$request->admin_token;
        // $admin->admin_image=$request->admin_image;
        $admin->admin_role=$request->admin_role;

        $admin->update();
        return redirect()->route('admin.index');

        // $admin->update($request()->all());
        // return view('admin-dashboard.manage_admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $admin=Admin::find($request);
        $admin->delete();

        return redirect()->route('admin.index');

    }
}
