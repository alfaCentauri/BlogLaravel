<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    /**
     * Clase Sluggable.
     */
    use Sluggable;
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
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * Local Scopes: Scope a query to only include search article.
     * @param \Illuminate\Database\Eloquent\Builder  $query Query.
     * @param String $title Palabra a buscar.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }
    /**
     * Local Scopes: Scope a query to only include search article
     * @param \Illuminate\Database\Eloquent\Builder  $query Query.
     * @param String $title Palabra a buscar.
     * @param String $category_id Indice de la categoria a buscar.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByCategory($query, $title, $category_id)
    {
        return $query->where('title', 'LIKE', "%$title%")
            ->where('category_id', $category_id);
    }
}
