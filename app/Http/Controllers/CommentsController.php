<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store()
    {
        $comment = new Comment($this->validateComment());
        $comment->save();

        return back();
    }

    /**
     * Validate a project
     */
    public function validateComment()
    {
        return request()->validate([
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
            'text' => 'required|min:5'
        ]);
    }
}
