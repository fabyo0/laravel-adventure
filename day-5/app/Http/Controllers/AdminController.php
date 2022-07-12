<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.admin');
    }

    public function viewProfile()
    {
        // user değişkenine auth bilgilerimizi
        // eşitleyip compact ile view kısmına yönlendirdik

        $user = Auth::user();
        return view('admin.view_profile', compact('user'));

    }

    // profile güncelleme
    public function viewProfileUpdate(ProfileUpdateRequest $request)
    {
        dd($request->all());
    }
}
