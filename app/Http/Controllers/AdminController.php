<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crew;
use App\Models\Request as UserRequest;
use App\Models\Event;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCrews = Crew::count();
        $users = User::all(); // Obtener todos los usuarios
        $crews = Crew::all(); // Obtener todas las crews
        $requests = UserRequest::all(); // Obtener todas las solicitudes
        $pendingRequests = UserRequest::where('status', 'pending')->count();
        

        return view('admin.index', compact('totalUsers', 'totalCrews', 'pendingRequests'));
    }
}