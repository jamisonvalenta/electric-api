<?php

namespace App\Http\Controllers;

use App\RawPost;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RawPostController extends Controller
{
    public function __construct(RawPost $rawPost)
    {
        $this->rawPost = $rawPost;
    }

    public function getIndex()
    {
        return view('raw-posts', ['posts' => $this->rawPost->orderBy('id', 'desc')->get()]);
    }

    public function postRaw(Request $request)
    {
        RawPost::create(['body' => $request->getContent()]);
    }
}
