<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecommendationAgentService;

class RecommendationAgentController extends Controller
{
    public function recommend($id)
{
    $data = (new RecommendationAgentService())->generateRecommendation($id);
    return response()->json($data);
}

}
