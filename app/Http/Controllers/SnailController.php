<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnailController extends Controller
{
    public function index()
    {
        
        return view('snails.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'well_depth' => 'required|numeric',
            'unit' => 'required|in:meters,inches'
        ]);

        $wellDepth = $request->input('well_depth');
        $unit = $request->input('unit');

        // Convert inches to meters if necessary
        if ($unit == 'inches') {
            $wellDepth = $wellDepth * 0.0254; // 1 inch = 0.0254 meters
        }

        $dayClimb = 3; // meters climbed during the day
        $nightFall = 2; // meters slid back during the night

        $currentHeight = 0;
        $days = 0;

        while ($currentHeight < $wellDepth) {
            $days++;
            // Snail climbs during the day
            $currentHeight += $dayClimb;

            // Check if snail has climbed out of the well
            if ($currentHeight >= $wellDepth) {
                break;
            }

            // Snail slides back during the night
            $currentHeight -= $nightFall;
        }

        return view('snails.index', ['days' => $days, 'calculated' => true]);
    }
}
