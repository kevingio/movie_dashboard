<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MovieController extends Controller
{
    private $page = 'movie';
    private $menus;

    public function __construct()
    {
        $this->menus = Menu::all();
    }

    public function index()
    {
        return view('movies.index')
            ->with('page', $this->page)
            ->with('menus', $this->menus);
    }
}
