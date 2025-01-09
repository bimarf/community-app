<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\User;
use App\Models\Answer;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'answerCount' => Answer::count(),
            'discussionCount' => Discussion::count(),
            'userCount' => User::count(),
            'latestDiscussions' => Discussion::with('category', 'user')
                ->orderBy('created_at', 'desc')->limit(3)->get(),
        ]);
    }
}
