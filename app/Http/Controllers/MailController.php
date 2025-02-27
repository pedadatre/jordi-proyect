<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class MailController extends Controller
{
    public function send(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        // Enviar el correo
        Mail::to('hello@example.com')->send(new ContactForm($data));

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Correo enviado correctamente');
    }
}