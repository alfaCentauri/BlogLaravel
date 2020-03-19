<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Clase Image; modelo de la tabla images. Contiene las relaciones entre tablas de la base de datos.
 *
 * @version 1.0.
 */
class Image extends Model
{
    /**
     * Nombre de la tabla ha usar.
     *
     * @var string Nombre de la tabla.
     */
    protected $table = "images";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'article_id',
    ];
    /**
     * Relación inversa a la tabla de articles.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo Regresa un objeto con la relación.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
    /**
     * Local Scopes: Scope a query to only include search images
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
