<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * Nombre de la tabla ha usar.
     *
     * @var string Nombre de la tabla.
     */
    protected $table = "phones";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
    ];

    /**
     * Get the user that owns the phone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Regresa un objeto con la relación si existe.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
