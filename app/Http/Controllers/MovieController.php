<?php

namespace App\Http\Controllers;
use App\Models\movie;
use App\Models\category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::all();
        $categories=Category::all();
        return view('admin-dashboard.manage_movies',compact('movies','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.manage_movies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'movie_name' => 'required|max:500',
            'movie_rate' => 'required|max:500',
            'movie_description' => 'required|max:2500',
            'movie_trailer' => 'required|max:2500',
            'movie_price' => 'required|max:500',
            'movie_cinemas' => 'required|max:500',
            'movie_sale_status' => 'required|max:500',
            'movie_new_price' => 'required|max:500',
            'movie_is_new' => 'required|max:500',
            'movie_daily_show' => 'required|max:500',
            'movie_image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        if ($request->hasFile('movie_image')) {
            $file = $request->movie_image;
            $new_file = time().$file->getClientOriginalName();
            $file->move('C:\Users\Orange\Desktop\cinema-project-react\public\assets\images\movies/', $new_file);
        }
        Movie::create([
            "movie_name" => $request->movie_name,
            "movie_rate" => $request->movie_rate,
            "movie_description" => $request->movie_description,
            "movie_trailer" => $request->movie_trailer,
            "movie_price" => $request->movie_price,
            "movie_cinemas" => $request->movie_cinemas,
            "movie_sale_status" => $request->movie_sale_status,
            "movie_new_price" => $request->movie_new_price,
            "movie_is_new" => $request->movie_is_new,
            "movie_daily_show" => $request->movie_daily_show,
            "movie_image" => 'C:\Users\Orange\Desktop\cinema-project-react\public\assets\images\movies/' . $new_file,
            "category_id" => $request->category,

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::find($id);
        $categories=Category::all();
        return view('admin-dashboard.updates.movie_update',compact('movie','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie=movie::find($id);
        if($request->hasFile('movie_image')){
            $file=$request->movie_image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/movie_image/',$new_file);
            $movie->movie_image='storage/movie_image/'.$new_file;
        }

        $movie->movie_name=$request->movie_name;
        $movie->movie_rate=$request->movie_rate;
        $movie->movie_description=$request->movie_description;
        $movie->movie_trailer=$request->movie_trailer;
        $movie->movie_price=$request->movie_price;
        $movie->movie_cinemas=$request->movie_cinemas;
        $movie->movie_sale_status=$request->movie_sale_status;
        $movie->movie_new_price=$request->movie_new_price;
        $movie->movie_is_new=$request->movie_is_new;
        $movie->movie_daily_show=$request->movie_daily_show;
        $movie->category_id = $request->category;


        $movie->update();
        return redirect()->route('movie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $movie=Movie::find($request);
        $movie->destroy($request);

        return redirect()->route('movie.index');
    }
}
