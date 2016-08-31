<?php

namespace App\Http\Controllers;

use App\Metier\CommentService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request,$userID,$livreID)
    {

        $this->commentService->addComment($request->all(), $userID,$livreID);
        return Redirect::back();
    }
}
