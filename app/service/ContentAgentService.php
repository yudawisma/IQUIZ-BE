<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ContentAgentService
{

    public function generateQuizWithGPT($topic)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => "Buat 10 soal pilihan ganda tentang $topic untuk pelajar SMA. Setiap soal harus mencakup satu jawaban benar dan tiga jawaban salah, serta jawaban yang benar harus dijelaskan."],
            ]
        ]);

        return $response['choices'][0]['message']['content'] ?? 'Tidak tersedia';
    }

    public function fetchContent($topic)
    {
        // Placeholder implementation for fetching content based on the topic
        return "Content for topic: " . $topic;
    }
}
