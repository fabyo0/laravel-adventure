<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dd('Get/POST matched!!');
    }

    public function guncelle(Request $request)
    {
        dd($request->all());
    }

    public function sil(Request $request)
    {
        dd($request->all());
    }

    public function anyTest(Request $request)
    {
        dd($request->all());
    }
}
