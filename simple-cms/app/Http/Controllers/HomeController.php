<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //TODO: consturct da middleware methodunu çağırarak url ile girilmesine engelledik
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showAddPost()
    {
        return view('admin.addPost');
    }

    public function addPost(Request $request)
    {
        //TODO: dd methodu ile debug yapabiliriz
        //dd($request->content);

        //form alanlarımızı requestden gelen alanlara eşitledik

        $name = $request->name;
        $content = $request->content;
        $status = $request->status;

        $data = [
            'name' => $name,
            'content' => $content,
            'status' => $status ?? 0
        ];


        //Fortify ile login register işlemşeri yapıldı ve makaleler tablosu oluşturulup ekleme yapıldı

        // insert posts

        Posts::create($data);

        //TODO : post türetip insert işlemi yaptık

        /*        $post = new Posts();

                $post->name = $name;
                $post->content = $content;
                //$post->status = $status;

                $post->save();*/

    }
}
