@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Category controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Category Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="category_image" value="{{$category->category_image}}">
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
