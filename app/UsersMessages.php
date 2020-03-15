<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersMessages extends Model
{
    protected $fillable = [
        'id_sender_letter', 'id_recipient_letter', 'message',
    ];

    protected $table = 'users_messages';
}
