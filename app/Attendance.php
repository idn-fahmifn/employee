<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_users');
    }
}
