<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Nombre de la tabla ha usar.
     *
     * @var string Nombre de la tabla.
     */
    protected $table = "categories";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Relación de uno a muchos; de una categoria a muchos articulos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Regresa un $this con el objeto relacionado a articulos.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
