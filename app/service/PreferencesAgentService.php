<?php

namespace App\Services;

use App\Models\User;
use App\Models\History;

class PreferenceAgentService
{
    public function getUserPreferences($userId)
    {
        $histories = History::where('user_id', $userId)->get();

        $preferredTopics = $histories->groupBy('topic')
                                     ->map->count()
                                     ->sortDesc()
                                     ->take(3)
                                     ->keys();

        $studyTimes = $histories->pluck('created_at')
                                ->map(function ($time) {
                                    return $time->format('H');
                                });

        $peakHour = $studyTimes->countBy()->sortDesc()->keys()->first();

        return [
            'top_topics' => $preferredTopics,
            'peak_hour' => $peakHour,
        ];
    }
}
