<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datadiri extends Model
{
    protected $table = 'datadiri';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
