<?php

namespace App\Livewire;

use App\Models\Friendship;
use App\Models\Message;
use App\Models\message_Sdr_Rcvr;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MainMenu extends Component
{
    use WithFileUploads;

    public $friendCode;
    public $myFriendCode;
    public $myID;
    public $newMessages;
    public $selectedFriend;

    public $message;
    public $friends;
    public $foto;

    public function loadFriends()
    {
        // Consulta 1: Donde friendCode está en el campo user_id
        $friendsAsUser = Friendship::select('users.username', 'users.pfploc', 'users.id')
            ->join('users', 'users.id', '=', 'friendships.friend_id')
            ->where('friendships.user_id', $this->myID)
            ->where('friendships.mutual', 1)
            ->get();

        // Consulta 2: Donde friendCode está en el campo friend_id
        $friendsAsFriend = Friendship::select('users.username', 'users.pfploc', 'users.id')
            ->join('users', 'users.id', '=', 'friendships.user_id')
            ->where('friendships.friend_id', $this->myID)
            ->where('friendships.mutual', 1)
            ->get();

        // Combina los resultados de ambas consultas
        $this->friends = $friendsAsUser->merge($friendsAsFriend);

        // Elimina duplicados si es necesario (por ejemplo, si hay amigos en ambas consultas)
        $this->friends = $this->friends->unique('id');
    }

    public function sendFriendRequest()
    {
        $this->validate([
            'friendCode' => 'required',
        ]);

        if ($this->friendCode == $this->myFriendCode) {
            $this->message = "You cannot add yourself as a friend.";
            return;
        }

        $friend = User::where('friendcode', $this->friendCode)->first();
        if ($friend) {
            $friendship = Friendship::where('friend_id', $this->myFriendCode)->first();
            if ($friendship) {
                $friendship->mutual = 1;
                $friendship->save();
                $this->message = "Friend {$friend->username} added!";
            } else {
                $friendship = new Friendship();
                $friendship->user_id = $this->myID;
                $friendship->friend_id = $friend->id;
                $friendship->save();
                $this->message = "Friend request sent to {$friend->username}!";
            }
        } else {
            $this->message = "Friend code not found.";
        }

        $this->friendCode = '';
        $this->loadFriends();
    }

    public function sendNewMessage()
    {
        // Validar los datos de entrada
        $this->validate([
            'newMessages' => 'required|string|max:232323',
            'selectedFriend' => 'required|exists:users,id',
            'foto' => 'nullable|image|max:2048', // Valida que sea imagen y menor a 2MB
        ]);

        // Manejar el archivo subido si existe
        $nombreArch = null;
        if ($this->foto) {
            $nombreArch = $this->foto->store('Images', 'public');
        }

        dd($this->foto);

        // Crear el mensaje
        $message = Message::create([
            'content' => $this->newMessages,
        ]);

        // Crear la relación en message_sdr_rcvr
        message_Sdr_Rcvr::create([
            'message_id' => $message->id,
            'sender_id' => $this->myID,
            'receiver_id' => $this->selectedFriend,
        ]);

        // Mensaje de éxito
        session()->flash('success', 'Message sent successfully!');
        $this->reset(['newMessages', 'selectedFriend', 'foto']); // Limpiar inputs
    }

    public function mount()
    {
        $this->myFriendCode = FacadesAuth::user()->friendcode ?? '00000-00000';
        $this->myID = FacadesAuth::user()->id;
        $this->friendCode = '';
        $this->message = '';
        $this->newMessages = '';
        $this->selectedFriend = '';

        $this->loadFriends();
    }

    public function render()
    {
        return view('livewire.main-menu');
    }
}
