@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Admin controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">

            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_name">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="admin_email">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_number">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Password </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="admin_password">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="admin_image">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Token </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_token">
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Admin Role </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="admin_role">
                                <option value="1">Admin</option>
                                <option value="0">SuberAdmin</option>
                            </select>
                          </div>
                        </div>
                  </div>
                  </div>

                  <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5> Admin Table</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                                <th>Admin Phone</th>
                                <th>Admin Password</th>
                                <th>Admin Image</th>
                                <th>Admin Token</th>
                                <th>Admin Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <th scope="row">{{$admin->id}}</th>
                                <td>{{$admin->admin_name}}</td>
                                <td>{{$admin->admin_email}}</td>
                                <td>{{$admin->admin_number}}</td>
                                <td>{{$admin->admin_password}}</td>
                                <td><img src="{{asset($admin->admin_image)}}" style="border-radius: 0px ; width:80px ; height: 80px " alt=""></td>
                                <td>{{$admin->admin_token}}</td>
                                <td>{{$admin->admin_role}}</td>
                                <td><a href="{{route('admin.edit',['id'=>$admin->id])}}"><i class="fas fa-edit" style="color: black ; font-size: 18px ;"></i></a></td>
                                <td><a href="{{route('admin.destroy',['id'=>$admin->id])}}" ><i class="fas fa-trash" style="color: black ; font-size: 18px ;"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
