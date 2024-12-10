<?php
// app/Http/Controllers/RequestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use App\Models\Request; // Asegúrate de importar el modelo adecuado
use App\Models\UserCrew; // Importar el modelo UserCrew
use App\Models\Crew; // Importar el modelo Crew

class RequestController extends Controller
{
    public function index()
    {
        // Obtener todas las solicitudes
        $requests = Request::all();

        // Pasar las solicitudes a la vista
        return view('admin.requests', compact('requests'));
    }

    public function create()
    {
        // Obtener todas las crews disponibles
        $crews = Crew::all();

        // Pasar las crews a la vista
        return view('user.request.create', compact('crews'));
    }

    public function store(HttpRequest $request)
    {
        $request->validate([
            'crew_id' => 'required|exists:crews,id',
        ]);

        Request::create([
            'user_id' => auth()->id(),
            'crew_id' => $request->crew_id,
            'status' => 'pending',
        ]);

        return redirect()->route('user.index')->with('success', 'Request submitted successfully.');
    }

    public function update(HttpRequest $request, $id)
    {
        $userRequest = Request::findOrFail($id);

        if ($request->action == 'accept') {
            $userRequest->status = 'accepted';

            // Registrar la relación en la tabla user_crew
            UserCrew::create([
                'user_id' => $userRequest->user_id,
                'crew_id' => $userRequest->crew_id,
                'year' => now()->year,
            ]);
        } elseif ($request->action == 'reject') {
            $userRequest->status = 'rejected';
        }

        $userRequest->save();

        return redirect()->route('admin.requests')->with('success', 'Request updated successfully.');
    }
}