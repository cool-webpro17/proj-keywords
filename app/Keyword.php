<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['project_id', 'keyword_name'];

    public function project() {
        return $this->belongsTo('App\Project')->withDefault();
    }
}
