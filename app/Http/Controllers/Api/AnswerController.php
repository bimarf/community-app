<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function answersByDiscussion(string $id)
    {
        return response()->json([
            'data' => Answer::where('discussion_id', $id)->get(),
        ]);
    }

    public function answerLike(Request $request)
    {
        if (!$request->answer_id) {
            return response()->json([
                'message' => 'missing answer_id',
            ], 422);
        }

        $answer = Answer::where('id', $request->answer_id)->first();

        if (!$answer) {
            return response()->json([
                'message' => 'answer not found',
            ], 404);
        }

        $answer->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'answer' => $answer->answer,
                'likeCount' => $answer->likeCount,
            ],
        ]);
    }
}
