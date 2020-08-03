<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function artefacts()
    {
        return $this->belongsToMany(Artefact::class);
    }
}
