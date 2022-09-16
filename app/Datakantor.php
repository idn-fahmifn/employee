<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datakantor extends Model
{
    protected $table = 'datakantor';
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }
}
