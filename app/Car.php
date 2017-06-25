<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'brand', 'model', 'power', 'drive_train', 'description', 'mileage', 'birth_day',
    ];


    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the tasks for the user.
     */
    public function records()
    {
        return $this->hasMany(Record::class);
    }

    /**
     * Get all of the tasks for the user.
     */
    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
