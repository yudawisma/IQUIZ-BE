<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class JadwalController extends Controller
{
    public function store(Request $request) {
        Schedule::create($request->all());
        return response()->json(['message' => 'Jadwal disimpan']);
    }

    public function show(Request $request) {
        $schedules = Schedule::where('user_id', $request->user()->id)->get();
        return response()->json($schedules);
    }
}

