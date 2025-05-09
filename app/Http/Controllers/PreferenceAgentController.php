<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PreferenceAgentService;

class PreferenceAgentController extends Controller
{
    public function getPreferences($id)
    {
        $service = new PreferenceAgentService();
        $preferences = $service->getUserPreferences($id);

        return response()->json($preferences);
    }
}
