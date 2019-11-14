<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'comment', 'url', 'path', 'user_id', 'view_count', 'delete_after'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
