<?php

namespace App\Http\Controllers;

use App\Services\PreferenceAgentService;
use App\Models\Content; 
use App\Services\RecommendationAgentService;
class ContentAgentController extends Controller
{
    protected $preferenceService;

    public function __construct(PreferenceAgentService $preferenceAgentService)
    {
        $this->preferenceService = $preferenceAgentService;
    }

    public function getRecommendedContent($userId)
    {
        // Ambil preferensi pengguna
        $preferences = $this->preferenceService->getUserPreferences($userId);
        
        // Ambil konten berdasarkan topik yang disukai
        $recommendedContent = Content::whereIn('topic', $preferences['top_topics'])
                                      ->get();

        return response()->json([
            'message' => 'Recommended content based on user preferences',
            'data' => $recommendedContent
        ]);
    }
}
