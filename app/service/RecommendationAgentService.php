<?php

namespace App\Services;

class RecommendationAgentService
{
    protected $prefAgent;
    protected $contentAgent;

    public function __construct()
    {
        $this->prefAgent = new PreferenceAgentService();
        $this->contentAgent = new ContentAgentService();
    }

    public function generateRecommendation($userId)
    {
        $prefs = $this->prefAgent->getUserPreferences($userId);
        $recommendations = [];

        foreach ($prefs['top_topics'] as $topic) {
            $content = $this->contentAgent->fetchContent($topic);
            $quiz = $this->contentAgent->generateQuizWithGPT($topic);

            $recommendations[] = [
                'topic' => $topic,
                'content' => $content,
                'quiz' => $quiz,
            ];
        }

        return [
            'recommendations' => $recommendations,
            'recommended_time' => $prefs['peak_hour'] . ':00',
        ];
    }
}
