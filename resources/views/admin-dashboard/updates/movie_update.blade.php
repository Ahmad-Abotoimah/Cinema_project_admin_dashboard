@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Movies controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('movie.update',['id'=>$movie->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_name" value="{{$movie->movie_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Rate </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_rate" value="{{$movie->movie_rate}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Trailer </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_trailer" value="{{$movie->movie_trailer}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="movie_image" value="{{$movie->movie_image}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Price </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_price" value="{{$movie->movie_price}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Sale Status </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_sale_status" value="{{$movie->movie_sale_status}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie New Price </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_new_price" value="{{$movie->movie_new_price}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Daily Show </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_daily_show" value="{{$movie->movie_daily_show}}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Cinemas </label>
                        <div class="col-sm-9">
                            <select name="movie_cinemas" id="inputState" class="form-control" value="{{$movie->movie_cinemas}}">
                                <option selected>Choose Cinema</option>
                              <option value="abdalimall"> Al Abdali Mall </option>
                              <option value="tajmall"> Taj Mall </option>
                              <option value="citymall"> City Mall </option>
                              <option value="online"> Online </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Is New </label>
                        <div class="col-sm-9">
                            <select name="movie_is_new" id="inputState" class="form-control" value="{{$movie->movie_is_new}}">
                                <option selected> Choose Movie Is New</option>
                              <option value="1"> Yes </option>
                              <option value="0"> No </option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Category </label>
                        <div class="col-sm-9">
                            <select name="category" id="inputState" class="form-control">
                                <option selected>Choose Category</option>
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->category_name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Description </label>
                        <div class="col-sm-9">
                            <textarea name="movie_description" class="form-control" cols="30" rows="10">{{$movie->movie_description}} </textarea>
                        </div>
                      </div>
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
