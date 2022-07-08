<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        // view veri gönderme
        $name = 'john';
        $lastName = 'doe';

        $id = $request->id;

        //return view('index',['name' => $name]);
        //return view('index', compact('name', 'lastName'));
        //TODO: with ile data gönderirken teker teker tanımlanır
        return view('index',compact('name','lastName','id'));
    }


    public function test(Request $request)
    {
        $id = $request->id;

        /*switch ($id){
            case  5:
                return 'id 5';
                break;
            case 7:
                return 'id 7';
                break;
            default:
                return 'değer bulunmadı';
        }*/

        //index methoduna yönlendirme yaptık
        return redirect()->route('index', ['id' => $id]);
    }
}
