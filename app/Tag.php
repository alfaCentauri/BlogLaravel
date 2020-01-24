<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Nombre de la tabla ha usar.
     *
     * @var string Nombre de la tabla.
     */
    protected $table = "tags";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
