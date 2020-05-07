<?php


namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\Contracts\View\View;
/**
 * Clase MenuComposer, permite cargar las categorias de forma optima para generar el menu de la vista publica.
 *
 * @author Ingeniero en Computación: Ricardo Presilla.
 * @version 1.0.
 */
class MenuComposer
{
    /**
     * Method for construct the view.
     * @param View $view The view.
     */
    public function compose(View $view)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $view->with('categories', $categories);
    }

    /**
     * Prepara los enlaces de las categorias para ser insertados en el html. Reemplaza los acentos, las dieresis y la ñ.
     *
     * @param $categories Listado de categorias.
     * @return array Regresa un arreglo con los nombres de las categorias sin acentos, ni dieresis o la letra ñ.
     */
    private function reemplazarCaracteresEspeciales($categories)
    {
        $linksDepurados = array();
        foreach ($categories as $category)
        {
            $nameCategory = strtolower( $category );
            $nameCategory = str_replace( "á", "a", $nameCategory );
            $nameCategory = str_replace( "é", "e", $nameCategory );
            $nameCategory = str_replace( "í", "i", $nameCategory );
            $nameCategory = str_replace( "ó", "o", $nameCategory );
            $nameCategory = str_replace( "ú", "u", $nameCategory );
            $nameCategory = str_replace( "ä", "a", $nameCategory );
            $nameCategory = str_replace( "ë", "e", $nameCategory );
            $nameCategory = str_replace( "ï", "i", $nameCategory );
            $nameCategory = str_replace( "ö", "o", $nameCategory );
            $nameCategory = str_replace( "ü", "u", $nameCategory );
            $nameCategory = str_replace( "ñ", "ni", $nameCategory );
            array_push($linksDepurados, $nameCategory);
        }
        return $linksDepurados;
    }
}
