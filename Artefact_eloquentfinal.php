<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artefact extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('artefacts.show', $this);
    } 
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
