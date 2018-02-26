<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'absence_date', 'start_time', 'end_time', 'total_time',
    ];

    protected $dates = [
        'absence_date', 'start_time', 'end_time', 'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
