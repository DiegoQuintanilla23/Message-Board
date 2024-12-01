<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\message_Sdr_Rcvr;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class MessageBoard extends Component
{
    public $messages;
    public $mymessages;
    public $width = 0;
    public $height = 0;

    public function mount()
    {
        $this->loadMessages();
        //$this->messages = [];
    }

    public function loadMessages()
    {
        $userId = Auth::id();

        $this->messages = message_Sdr_Rcvr::select(
            'messages.content',
            'messages.created_at',
            'messages.id',
            'message_sdr_rcvr.receiver_id',
            'message_sdr_rcvr.sender_id',
            'message_images.image_loc',
            'users.username',
            'users.pfploc',
            'messages.created_at'
        )
            ->join('messages', 'messages.id', '=', 'message_sdr_rcvr.message_id')
            ->join('users', 'users.id', '=', 'message_sdr_rcvr.sender_id')
            ->leftJoin('message_images', 'messages.id', '=', 'message_images.message_id')
            ->where('message_sdr_rcvr.receiver_id', $userId)
            ->latest()->get();

        $this->mymessages = message_Sdr_Rcvr::select(
            'messages.content',
            'messages.created_at',
            'messages.id',
            'message_sdr_rcvr.receiver_id',
            'message_sdr_rcvr.sender_id',
            'message_images.image_loc',
            'users.username',
            'users.pfploc',
            'messages.created_at'
        )
            ->join('messages', 'messages.id', '=', 'message_sdr_rcvr.message_id')
            ->join('users', 'users.id', '=', 'message_sdr_rcvr.sender_id')
            ->leftJoin('message_images', 'messages.id', '=', 'message_images.message_id')
            ->where('message_sdr_rcvr.sender_id', $userId)
            ->latest()->get();
    }

    public function createMessage()
    {
        $userId = Auth::id();

        $message = Message::create([
            'content' => 'Mensaje creado a las ' . now(),
        ]);

        $msgrel = new message_Sdr_Rcvr();
        $msgrel->receiver_id = $userId;
        $msgrel->sender_id = $userId;
        $msgrel->message_id = $message->id;
        $msgrel->save();

        // Recargar mensajes para incluir el nuevo
        //$this->messages->push($message);
        $this->loadMessages();
    }

    #[On('updateDimensions')]
    public function updateDimensions($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.message-board');
    }
}
