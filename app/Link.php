<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['token', 'url', 'file_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
