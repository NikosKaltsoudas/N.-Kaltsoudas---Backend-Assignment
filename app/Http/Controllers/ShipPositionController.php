<?php

namespace App\Http\Controllers;

use App\Models\ShipPosition;
use App\Http\Requests\ShipPositionRequest;

class ShipPositionController extends Controller
{
    public function index(ShipPositionRequest $request)
    {
        $shipPositionQuery = ShipPosition::query();
        
        if(!empty($request->mmsi)){
            $shipPositionQuery->whereIn('mmsi', is_array($request->mmsi) ? $request->mmsi : (array) $request->mmsi);
        }
        
        $shipPositionQuery->whereBetween('lat', [$request->min_latitude, $request->max_latitude]);
        $shipPositionQuery->whereBetween('lon', [$request->min_longtitude, $request->max_longtitude]);
        $shipPositionQuery->whereBetween('timestamp', [$request->time_from, $request->time_to]);

        return response($shipPositionQuery->get())->header('Content-Type','application/json');
    }
}
