<?php
use App\Models\Category;
use App\Models\QuizHistory;
use Illuminate\Http\Request;
use App\Services\ContentAgentService;

class QuizController
{
    public function getQuiz($category) {
        $questions = app(ContentAgentService::class)->generateQuizWithGPT($category);
        return response()->json(['questions' => $questions]);
    }

    public function storeHistory(Request $request) {
        QuizHistory::create($request->all());
        return response()->json(['message' => 'Riwayat tersimpan']);
    }

    public function history(Request $request) {
        $history = QuizHistory::where('user_id', $request->user()->id)->get();
        return response()->json($history);
    }
}
