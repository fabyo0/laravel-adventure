<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        // eloquent model güncelleme
        $userID = Auth::id();

        // email duplicate

        $duplicateControl = User::where('email', '!=', auth()->user()->email)
            ->where('email', $email)
            ->first();

        if ($duplicateControl) {
            alert()->error('Uyarı', 'Daha önce girilen email adresi kullanılmış')
                ->showConfirmButton('Tamam', '#3085d6');
            return redirect()->route('admin.viewProfile');
        }

        $user = User::find($userID);

        $user->name = $name;
        $user->email = $email;

        if ($password) {
            $user->password = bcrypt($password);
        }
        $user->save();

        // Model üzerinden güncelleme yapmak
        /*$data = [
          'email' => $email,
          'name' => $password
        ];

        if ($password){
            $data['password'] = bcrypt($password);
        }
        User::where('id',$userID)->update($data);*/
    }
}
