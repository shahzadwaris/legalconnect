<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender', 'id');
    }

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver');
    }
}
