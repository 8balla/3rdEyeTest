<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starfleet extends Model
{
    use HasFactory;

    protected $fillable = [
       'obj', 'name', 'class', 'crew', 'image', 'value', 'status', 'armament'
    ];
    public function armament()
    {
        return $this->hasManyThrough(
            // required
            'App\Models\Armament', // the related model
            'App\Models\Fleet', // the pivot model

            // optional
            'starfleet_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'armament_id' // the related model id in the pivot
        );
    }
}
