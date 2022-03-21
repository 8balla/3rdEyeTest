<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armament extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'obj_id', 'title', 'qty',
    ];

    public function starfleet()
    {
        return $this->hasManyThrough(
            // required
            'App\Models\Starfleet', // the related model
            'App\Models\Fleet', // the pivot model

            // optional
            'armament_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'starfleet_id' // the related model id in the pivot
        );
    }
}
