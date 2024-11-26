<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message_Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'message_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message_id',
        'image_loc',
    ];

    /**
     * The message that this image belongs to.
     */
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
