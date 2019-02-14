<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description'];

    public function keywords() {
        return $this->hasMany('App\Keyword');
    }
}
