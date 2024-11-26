<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message_id',
        'user_id',
        'content',
    ];

    /**
     * The message that this comment belongs to.
     */
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    /**
     * The user who made this comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
