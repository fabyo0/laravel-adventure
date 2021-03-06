<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        // giris yapılmısa admin yönlendirdik
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view('auth.login');
    }

    // Hatalarımızı kısıtlamak için LoginRequest kullandık
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        // remember default olarak false gelmektedir
        !is_null($remember) ? $remember = true : $remember = false;

        // mail kontrolü
        $user = User::where('email', $email)->first();

        // şifre eşleşiyorsa
        if ($user && Hash::check($password, $user->password)) {
            // kullanıcı login- rememeber true ise token oluşturuldu
            Auth::login($user, true);
            return redirect()->route('admin.index');

        } else {
            alert()->error('Uyarı', 'Kullanıcı adı veya şifreniz yanlış.')
                ->showConfirmButton('Tamam', '#3085d6');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
