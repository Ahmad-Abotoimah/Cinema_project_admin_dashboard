@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>User controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_name" value="{{$user->user_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="user_email" value="{{$user->user_email}}">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Phone </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_number" value="{{$user->user_number}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Password </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="user_password" value="{{$user->user_password}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="user_image" value="{{$user->user_image}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> User Token </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_token" value="{{$user->user_token}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                      </div>            </form>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
