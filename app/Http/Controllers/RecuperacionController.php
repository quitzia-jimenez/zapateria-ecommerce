<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RecuperacionController extends Controller
{
    public function mostrarFormulario()
    {
        return view('auth.solicitud-recuperacion');
    }

    public function enviarCorreo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->email;
        $token = Str::random(60);
        Cache::put('password_reset_' . $token, $email, 60 * 60);
        
        $resetUrl = route('recuperacion.reset', ['token' => $token]);
        Mail::send('emails.recuperacion', ['resetUrl' => $resetUrl], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Recuperación de contraseña');
        });
        
        return back()->with('status', 'Hemos enviado un enlace de recuperación a tu correo electrónico.');
    }

    public function formularioRestablecimiento($token)
    {
        $email = Cache::get('password_reset_' . $token);
        
        if (!$email) {
            return redirect()->route('login')->with('error', 'El enlace de recuperación ha expirado o es inválido.');
        }
        
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function restablecerContrasena(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        
        $email = Cache::get('password_reset_' . $request->token);
        
        if (!$email || $email !== $request->email) {
            return redirect()->route('login')->with('error', 'El enlace de recuperación ha expirado o es inválido.');
        }
        
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        
        Cache::forget('password_reset_' . $request->token);
        
        return redirect()->route('login')->with('status', 'Tu contraseña ha sido restablecida correctamente.');
    }
}