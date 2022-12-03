<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function Daftar()
        {
            $data['title'] = 'Register';
            return view("user/register", $data);
        }

        public function ProcessDaftar(Request $request) {
            $validateData = $request->validate([
                'name' => 'required|max:25',
                'email' => 'email | required | unique:users',
                'password' => 'required | confirmed'
            ]);
    
            // create user
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
    
            $user->save();
            return redirect('user/login')->with('success', 'Registrasi Berhasil, Silahkan Login Ke Akun Anda !');
        }

       // public function ProsesDaftar(Request $request)
        //{
          //  $request->validate ([
            //    "name"                  => "required",
              //  "email"                 => "required|unique:Users",
               // "password"              => "required|min:6",
                //"password_confirmation" => "required|same:password",
            //]);

            //$user = new User ([
              //  'name'                  => $request->name,
               // 'email'                 => $request->email,
               // 'password'              => bcrypt($request->password),
               // 'password_confirmation' => $request->password_confirmation,

           // ]);

           // $user->save();
           // return redirect('user/login')->with('success', 'Registrasi Berhasil, Silahkan Login Ke Akun Anda !');
       // }

        public function Login()
        {
            $data['title'] = 'Login';
            return view('user/login', $data);
        }


     //   public function ProsesLogin(Request $request)
   // {
     //   $request->validate([
          //  'email' => 'required',
            //'password' => 'required',
        //]);
        //if (Auth::attempt([
          //  'email'     => $request->email, 
            //'password'  => $request->password])) {
           
           //$request->session()->regenerate();
            //return redirect()->intended('TampilUser/Dashboard');
        //}

       // return back()->withErrors([
         //   'password' => 'Email dan Password Salah, Masukan Dengan Benar !',
      ////  ]);
   // }

   public function processLogin(Request $request) {
    // Form Validation
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // dd($credentials);

    // Proses Validasi User
    if (Auth::attempt($credentials)== true) {
        $request->session()->regenerate();

        // dd("Berhasil Login");

        if (Auth::user()->type == 0) { // user
            return redirect('welcome');
        } else { //ADMIN
            return redirect('admin');
        }

    } else {

        // dd("Gagal Login");

        return redirect('user/login')->withErrors('Login Gagal');
    }
}

}
