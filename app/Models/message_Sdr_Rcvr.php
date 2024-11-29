<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class message_Sdr_Rcvr extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'message_sdr_rcvr';

    protected $fillable = [
        'message_id',
        'receiver_id',
        'sender_id',
    ];
}
