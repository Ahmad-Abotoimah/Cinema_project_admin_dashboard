@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">
    <h5>Movies controls</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('movie.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_name">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Rate </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_rate">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Trailer </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_trailer">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Image </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="movie_image">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Price </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_price">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Sale Status </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_sale_status">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie New Price </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_new_price">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Daily Show </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="movie_daily_show">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Movie Cinemas </label>
                        <div class="col-sm-9">
                            <select name="movie_cinemas" id="inputState" class="form-control">
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
                            <select name="movie_is_new" id="inputState" class="form-control">
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
                            <textarea name="movie_description" class="form-control" cols="30" rows="10"> </textarea>
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

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5> Movies Table</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Movie Name</th>
                                <th>Movie Rate</th>
                                <th>Movie Description</th>
                                <th>Movie Trailer</th>
                                <th>Movie Image</th>
                                <th>Movie price</th>
                                <th>Movie Cinemas</th>
                                <th>Movie Sale Status</th>
                                <th>Movie New Price</th>
                                <th>Movie Is New</th>
                                <th>Daily Show</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                            <tr>
                                <th scope="row">{{$movie->id}}</th>
                                <td>{{$movie->movie_name}}</td>
                                <td>{{$movie->movie_rate}}</td>
                                <td>{{$movie->movie_description}}</td>
                                <td>{{$movie->movie_trailer}}</td>
                                <td><img src="{{asset($movie->movie_image)}}" style="border-radius: 0px ; width:80px ; height: 80px "></td>
                                <td>{{$movie->movie_price}}</td>
                                <td>{{$movie->movie_cinemas}}</td>
                                <td>{{$movie->movie_sale_status}}</td>
                                <td>{{$movie->movie_new_price}}</td>
                                <td>{{$movie->movie_is_new}}</td>
                                <td>{{$movie->movie_daily_show}}</td>
                                <td><a href="{{route('movie.edit',['id'=>$movie->id])}}"><i class="fas fa-edit" style="color: black ; font-size: 18px ;"></i></a></td>
                                <td><a href="{{route('movie.destroy',['id'=>$movie->id])}}" ><i class="fas fa-trash" style="color: black ; font-size: 18px ;"></i></a></td>
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
