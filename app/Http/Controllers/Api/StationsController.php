<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationsController extends Controller
{
    public function get(Request $request) {
        return response()->json([
            'stations' => Station::get()->pluck('title', 'id')
        ]);
    }
}
