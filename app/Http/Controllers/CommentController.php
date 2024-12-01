<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\message_Sdr_Rcvr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function viewComments($messageId)
    {
        $message = message_Sdr_Rcvr::select(
            'messages.content',
            'messages.created_at',
            'messages.id',
            'message_images.image_loc',
            'users.username',
            'users.pfploc',
            'messages.created_at'
        )
            ->join('messages', 'messages.id', '=', 'message_sdr_rcvr.message_id')
            ->join('users', 'users.id', '=', 'message_sdr_rcvr.sender_id')
            ->leftJoin('message_images', 'messages.id', '=', 'message_images.message_id')
            ->where('messages.id', $messageId)
            ->first();

        $comments = Comment::select('comments.*','users.username')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('message_id','=',$messageId)->get();
        return view('viewComments', compact('message', 'comments'));
    }

    public function postComment(Request $request)
    {
        // Valida el contenido del comentario
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // Guarda el comentario
        Comment::create([
            'message_id' => $request->message_id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        // Redirige a la página de comentarios con un mensaje de éxito
        return redirect()->route('viewComments', $request->message_id)->with('success', 'Comment added successfully!');
    }
}
