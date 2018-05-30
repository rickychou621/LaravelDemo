<?php

namespace App\Model\Ricky;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['id', 'context', 'author', 'title', 'created_at', 'updated_at'];
}
