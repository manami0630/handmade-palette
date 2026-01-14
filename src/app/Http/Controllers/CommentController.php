<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        Comment::create([
            'product_id' => $validated['product_id'],
            'user_id' => $validated['user_id'],
            'content' => $validated['content'],
        ]);

        return redirect()->back();
    }
}