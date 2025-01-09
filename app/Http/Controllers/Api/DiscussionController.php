<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function discussions(){
        return response()->json([
            'data' => Discussion::all(),
        ]);
    }

    public function discussionLike(Request $request){
        if(!$request->slug){
            return response()->json([
                'message' => 'Slug is required',
            ], 422);
        }

        $discussion = Discussion::where('slug', $request->slug)->first();

        if(!$discussion){
            return response()->json([
                'message' => 'Discussion not found',
            ], 404);
        }

        $discussion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'discussion_title' => $discussion->title,
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }
}
