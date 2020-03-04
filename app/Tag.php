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
    /**
     * Relación inversa de muchos a muchos; muchos tags (etiquetas) tienen muchos articulos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Regresa un objeto con la relación si existe.
    */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    /**
     * Local Scopes: Scope a query to only include search tags
     * @param  \Illuminate\Database\Eloquent\Builder  $query Query.
     * @param String $name Palabra a buscar.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }
}
