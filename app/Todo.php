<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['description', 'user_id'];

    public function status()
    {
      return ($this->status) ? 'done' : 'undone';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
