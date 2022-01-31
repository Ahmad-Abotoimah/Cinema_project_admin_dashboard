<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin-dashboard.manage_users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.manage_users');
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
            'name'=>'required|max:250',
            'email'=>'required|max:250',
            'password'=>'required|max:250',
            'user_number'=>'required|max:250',
            'user_token'=>'required|max:250',
            'user_image' => 'required|mimes:jpeg,png,gif,jpg',

          ]);

          if ($request->hasFile('user_image')) {
            $file = $request->user_image;
            $new_file = time().$file->getClientOriginalName();
            $file->move('storage/user_image/', $new_file);
        }

          User::create([
              "name"=>$request->user_name,
              "email"=>$request->user_email,
              "user_number"=>$request->user_number,
              "user_token"=>$request->user_token,
              "user_image"=> 'storage/user_image/' . $new_file,
              "password"=> Hash::make ($request->user_password) ,

         ]);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin-dashboard.updates.user_update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);

        if($request->hasFile('user_image')){
            $file=$request->user_image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/user_image/',$new_file);
            $user->user_image='storage/user_image/'.$new_file;
        }

        $user->name=$request->user_name;
        $user->email=$request->user_email;
        $user->password=$request->user_password;
        $user->user_number=$request->user_number;
        $user->user_token=$request->user_token;

        $user->update();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->destroy($id);

        return redirect()->route('user.index');
    }
}
