<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class DashboardController extends Controller
{
    private $page = 'home';
    private $menus;

    public function __construct()
    {
        $this->menus = Menu::all();
    }

    public function index()
    {
        return view('dashboard.index')
            ->with('page', $this->page)
            ->with('menus', $this->menus);
    }
}
