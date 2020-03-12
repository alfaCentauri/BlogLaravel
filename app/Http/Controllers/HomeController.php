<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
/**
 * Clase HomeController controla las acciones del módulo público.
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::orderby('created_at', 'desc')->paginate(4);
        return view('home', ['articles' => $articles]);
    }
}
