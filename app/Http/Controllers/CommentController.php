<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        {
            $comments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*', 'users.name as user_name')
                ->get();
    
            $commentIds = $comments->pluck('id');
            $likes = DB::table('likes')
                ->whereIn('comment_id', $commentIds)
                ->select('comment_id', DB::raw('COUNT(*) as like_count'))
                ->groupBy('comment_id')
                ->get()
                ->keyBy('comment_id');
            
    
            return view('comments.index', compact('comments', 'likes'));
        }
    }
}
