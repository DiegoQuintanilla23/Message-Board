<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('UpdateMessages.{iduser}', function ($user, $iduser) {
    // Permite escuchar el evento solo si el usuario autenticado coincide con el destinatario
    //return (int) $user->id === (int) $iduser;
    return true;
});

Broadcast::channel('UpdateMessagesPB', function () {
    return true; // Todos pueden suscribirse sin autenticación
});
