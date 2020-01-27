<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Nombre de la tabla ha usar.
     *
     * @var string Nombre de la tabla.
    */
    protected $table = "articles";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'category_id',
    ];

    /**
     * Relación inversa a la tabla de categorias. Muchos articulos a una categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Regresa un objeto con la relación si existe.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    /**
     * Relación inversa a la tabla de usuarios.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo Regresa un objeto con la relación si existe.
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Relación de uno a muchos; un articulo puede contener una o más imagenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Regresa un objeto con la relación si existe.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Relación de muchos a muchos; los articulos con las etiquetas (tags).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Regresa un objeto con la relación si existe.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
