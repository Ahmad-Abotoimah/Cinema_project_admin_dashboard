
@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Admin controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">

            <form action="{{route('admin.update',['id'=>$admin->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_name" value="{{$admin->admin_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="admin_email" value="{{$admin->admin_email}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_number" value="{{$admin->admin_number}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Password </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="admin_password" value="{{$admin->admin_password}}">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="admin_image" value="{{$admin->admin_image}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Admin Token </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="admin_token" value="{{$admin->admin_token}}">
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
                            <select class="form-control" name="admin_role" value="{{$admin->admin_role}}">
                                <option value="0">Admin</option>
                                <option value="1">SuberAdmin</option>
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
</div>

@endsection
