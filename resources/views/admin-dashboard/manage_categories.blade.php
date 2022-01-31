@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Category controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category_name">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Category Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="category_image">
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
                <h5> Category Table</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($categories as $category)
                            <tr>
                            <td> {{$category->id}} </td>
                            <td> {{$category->category_name}}</td>
                            <td> <img src="{{asset($category->category_image)}}" style="border-radius: 0px ; width:80px ; height: 80px " alt=""> </td>
                            <td><a href="{{route('category.edit',['id'=>$category->id])}}"><i class="fas fa-edit" style="color: black ; font-size: 18px ;"></i></a></td>
                            <td><a href="{{route('category.destroy',['id'=>$category->id])}}" ><i class="fas fa-trash" style="color: black ; font-size: 18px ;"></i></a></td>
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
