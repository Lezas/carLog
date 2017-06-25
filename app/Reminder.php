<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date_interval',
        'mileage_interval',

    ];
    /**
     * Get the user that owns the task.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Get the phone record associated with the user.
     */
    public function lastRecord()
    {
        return $this->hasOne('App\Record','service_id','last_service_id');
    }

    public function records()
    {
        return $this->hasOne('App\Record');
    }

}
