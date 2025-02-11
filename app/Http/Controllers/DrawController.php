<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Location;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    const MAX_HEIGHT = 5;
    const MAX_WIDTH = 5;

    // Show the Draw View for a specific year
    public function show(Request $request, $year = null)
    {
        $currentYear = now()->year;
        if (is_null($year)) {
            $year = $currentYear;
        }

        $locations = Location::where('year', $year)->with('crew')->get();
        $showDrawButton = $locations->count() === 0;
        $rangeYears = range($currentYear - 4, $currentYear);
        rsort($rangeYears);
        


        return view('admin.draws', [
            'locations' => $locations,
            'year' => $year,
            'showDrawButton' => $showDrawButton,
            'rangeYears' => $rangeYears
            
        ]);
    }
    public function showUserPosition(Request $request, $year = null)
{
    $currentYear = now()->year;
    if (is_null($year)) {
        $year = $currentYear;
    }
    
    $locations = Location::where('year', $year)->with('crew')->get();
    $rangeYears = range($currentYear - 4, $currentYear);
    rsort($rangeYears);
    $userCrew = auth()->user()->crews()->first();

    return view('user.draws.show', [
        'locations' => $locations,
        'year' => $year,
        'rangeYears' => $rangeYears,
        'userCrew' => $userCrew
    ]);
}

    // Perform the draw for a specific year
    public function performDraw(Request $request, $year)
{
    // Eliminar ubicaciones existentes para el año seleccionado
    Location::where('year', $year)->delete();

    $crews = Crew::all()->pluck('name', 'id');

    if (count($crews) === 0) {
        return back()->withErrors('No hay peñas disponibles para este año.');
    }

    $places = [];
    $nCrews = count($crews);

    // Asignar coordenadas aleatorias válidas para cada peña
    foreach ($crews as $crewId => $crewName) {
        $isValidCoord = false;
        while (!$isValidCoord) {
            $x = rand(0, (self::MAX_WIDTH - 1));
            $y = rand(0, (self::MAX_HEIGHT - 1));
            $coord = [$x, $y];
            $isValidCoord = $this->isValidCoord($coord, $places);
            if ($isValidCoord) {
                $places[$crewId] = $coord;
            }
        }
    }

    $locations = [];
    foreach ($places as $crewId => $coord) {
        $locations[] = [
            'x' => $coord[0], // x
            'y' => $coord[1], // y
            'crew_id' => $crewId,
            'year' => $year
        ];
    }

    // Guardar las nuevas ubicaciones en la base de datos
    foreach ($locations as $location) {
        Location::create($location);
    }

    return redirect()->route('draw.show', ['year' => $year])
        ->with('success', 'El sorteo se ha realizado correctamente.');
}

    private function isValidCoord($coord, $places)
    {
        $isValidCoord = true;
        list($x, $y) = $coord;
        foreach ($places as $place) {
            if ($place[0] == $x && $place[1] == $y) {
                $isValidCoord = false;
                break;
            }
        }
        return $isValidCoord;
    }
}