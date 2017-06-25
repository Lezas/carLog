<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $fillable = [
        'name',
        'date',
        'description',
        'mileage',
        'labor_cost',
        'parts_cost',
        'deleted'

    ];
    /**
     * Get the user that owns the task.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
