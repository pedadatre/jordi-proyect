<?php
// app/Http/Controllers/AdminCrewController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;

class AdminCrewController extends Controller
{
    public function index(Request $request)
    {
        $crews = Crew::all();
        $query = $request->input('query');
    $crews = Crew::when($query, function ($q) use ($query) {
        return $q->where('name', 'LIKE', '%' . $query . '%');
    })->get();
        return view('admin.crews.index', compact('crews', 'query'));
    }

   

    public function create()
    {
        return view('admin.crews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'slogan' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'fondation_date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'main_activities' => 'required|string|max:255',
            'leader' => 'required|string|max:255',
            'events_count' => 'required|integer',
            'contact_email' => 'required|string|email|max:255',
        ]);

        Crew::create($request->all());

        return redirect()->route('admin.crews.index')->with('success', 'Crew created successfully.');
    }

    public function edit(Crew $crew)
    {
        return view('admin.crews.edit', compact('crew'));
    }

    public function update(Request $request, Crew $crew)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'slogan' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'fondation_date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'main_activities' => 'required|string|max:255',
            'leader' => 'required|string|max:255',
            'events_count' => 'required|integer',
            'contact_email' => 'required|string|email|max:255',
        ]);

        $crew->update($request->all());

        return redirect()->route('admin.crews.index')->with('success', 'Crew updated successfully.');
    }

    public function destroy(Crew $crew)
    {
        $crew->delete();
        return redirect()->route('admin.crews.index')->with('success', 'Crew deleted successfully.');
    }

    public function updateDescription(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $crew = Crew::findOrFail($id);
        $crew->description = $request->description;
        $crew->save();

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $crew = Crew::findOrFail($id);
        return view('admin.crews.show', compact('crew'));
    }
}