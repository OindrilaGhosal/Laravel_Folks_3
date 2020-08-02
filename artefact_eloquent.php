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
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
