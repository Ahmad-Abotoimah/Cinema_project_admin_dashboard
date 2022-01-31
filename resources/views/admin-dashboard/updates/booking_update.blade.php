@extends('admin-dashboard.layouts.master')
@section('content')

<div class="card-body">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5> Admin Booking</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name </th>
                                <th>Movie Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $book)
                            <tr>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{$book->user->user_name}}</td>
                                <td>{{$book->movie->movie_name}}</td>
                                <td><a href="{{route('booking.edit',['id'=>$book->id])}}"><i class="fas fa-edit" style="color: black ; font-size: 18px ;"></i></a></td>
                                <td><a href="{{route('booking.destroy',['id'=>$book->id])}}" ><i class="fas fa-trash" style="color: black ; font-size: 18px ;"></i></a></td>
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
