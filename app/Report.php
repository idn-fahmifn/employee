<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $guarded = [];

    public function attendance()
    {
        return $this->belongsTo('App\Attendance', 'id_attendance');
    }
    
}
