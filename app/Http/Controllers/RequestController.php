<?php
// app/Http/Controllers/RequestController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as UserRequest;
use App\Models\Crew;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function create()
    {
        $crews = Crew::all();
        return view('user.request', compact('crews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'crew_id' => 'required|exists:crews,id',
        ]);

        UserRequest::create([
            'user_id' => Auth::id(),
            'crew_id' => $request->crew_id,
            'status' => 'pending',
        ]);

        return redirect()->route('user.index')->with('success', 'Request sent successfully.');
    }

    public function index()
    {
        $requests = UserRequest::where('status', 'pending')->get();
        return view('admin.requests', compact('requests'));
    }

    public function update(Request $request, UserRequest $userRequest)
    {
        $request->validate([
            'status' => 'required|in:accepted,denied',
        ]);

        $userRequest->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.requests')->with('success', 'Request updated successfully.');
    }
}