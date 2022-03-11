<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      $rules = array(
          'email' => 'required|string|max:50',
          'password' => 'required|string|min:6|confirmed',
          'role' => 'required|integer'
      );
  
      $cek = Validator()->make($request->all(),$rules);
  
          if($cek->fails()){
              $errorString = implode(",",$cek->getMessageBag()->all());
              return response()->json([
                  'message' => $errorString
              ], 401);
          }else{
              $user = User::create([
                  'email' => $request->email,
                  'password' => bcrypt($request->password),
                  'role' => $request->role
              ]);
  
              if ($user->role == 1) {
                  $user->assignRole('admin');
                  
              }else {
                  $user->assignRole('pelanggan');
               
              }
  
              return redirect('/')->with('success','Registrasi berhasil silahkan login');
          }
      }

    public function login(Request $request)
    {
        $rules = array(
            
            'email' => 'required|string|max:50',
            'password' => 'required|string|min:6'
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->getMessageBag()->all());
            return redirect()->route('login')->with('warning', $errorString);
        }else{
            if (Auth::attempt($request->only('email', 'password'))){
                $user = User::where('email', $request->email)->first();
               
                if($user->hasRole('admin')){
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('dashboardUser');
                }
            }else{
                return redirect()->route('login')->with('warning', "Email / Password Salah");
            }
        }
    }
}
