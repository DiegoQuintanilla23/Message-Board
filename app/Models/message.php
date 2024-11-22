<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'content',
    ];

    /**
     * The user who sent the message.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The comments associated with this message.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The image associated with this message (if any).
     */
    public function image()
    {
        return $this->hasOne(Message_Image::class);
    }
}
