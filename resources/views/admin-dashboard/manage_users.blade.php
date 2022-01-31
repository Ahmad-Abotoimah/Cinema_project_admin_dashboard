@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>User controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_name">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="user_email">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Phone </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_number">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Password </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="user_password">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="user_image">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Token </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_token">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                      </div>            </form>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5> User Table</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>User Password</th>
                                <th>User Image</th>
                                <th>User Token</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->user_number}}</td>
                                <td>{{$user->password}}</td>
                                <td><img src="{{asset($user->user_image)}}" style="border-radius: 0px ; width:80px ; height: 80px " alt=""></td>
                                <td>{{$user->user_token}}</td>
                                <td><a href="{{route('user.edit',['id'=>$user->id])}}"><i class="fas fa-edit" style="color: black ; font-size: 18px ;"></i></a></td>
                                <td><a href="{{route('user.destroy',['id'=>$user->id])}}" ><i class="fas fa-trash" style="color: black ; font-size: 18px ;"></i></a></td>
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
