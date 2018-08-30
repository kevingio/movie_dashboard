<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
        $client = new Client();
        $request = $client->get('https://api.themoviedb.org/3/trending/person/week?api_key=757cc7494e774799984d5df49439f890');
        $persons = json_decode($request->getBody()->getContents());
        $request = $client->get('https://api.themoviedb.org/3/trending/movie/week?api_key=757cc7494e774799984d5df49439f890');
        $movies = json_decode($request->getBody()->getContents());
        $movies->results = array_slice($movies->results, 0, 5, true);
        foreach ($movies->results as $movie) {
            $movie->release_date = str_before($movie->release_date, '-');
        }
        return view('dashboard.index')
            ->with('page', $this->page)
            ->with('menus', $this->menus)
            ->with('trending_persons', $persons->results)
            ->with('trending_movies', $movies->results);
    }
}
