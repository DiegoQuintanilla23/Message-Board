<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Message_Image;
use App\Models\MessageImage;
use Illuminate\Support\Facades\Auth;

class MessageBoard extends Component
{
    public $messages;

    public function mount()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Cargar los mensajes desde la base de datos con su imagen
        $this->messages = Message::with('image')->where('receiver_id','=',$userId)->get(); // Cargar mensajes con la imagen relacionada
    }

    public function render()
    {
        return view('livewire.message-board');
    }
}
