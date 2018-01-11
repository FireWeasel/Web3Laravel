<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['message', 'conversation_id'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function conversation() {
    return $this->belongsTo(Conversation::class);
  }
}
