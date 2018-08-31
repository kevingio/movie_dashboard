<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    private $page = 'movie';
    private $menus;
    private $base_image_url = 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/';
    private $client;

    public function __construct()
    {
        $this->menus = Menu::all();
        $this->client = new Client();
    }

    public function index()
    {
        $request = $this->client->get('https://api.themoviedb.org/3/trending/movie/week?api_key=757cc7494e774799984d5df49439f890');
        $movies = json_decode($request->getBody()->getContents());
        $request = $this->client->get('https://api.themoviedb.org/3/genre/movie/list?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $genre_response = json_decode($request->getBody()->getContents());
        foreach ($movies->results as $movie) {
            foreach ($movie->genre_ids as $genre_id) {
                foreach ($genre_response->genres as $genre) {
                    if($genre_id == $genre->id){
                        $movie->genres[] = $genre->name;
                    }
                }
            }
            $movie->poster_path = $this->base_image_url . $movie->poster_path;
            $movie->release_date = str_before($movie->release_date, '-');
        }
        return view('movies.index')
            ->with('page', $this->page)
            ->with('menus', $this->menus)
            ->with('trending_movies', $movies->results);
    }

    public function streaming($id)
    {
        $request = $this->client->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $movie = json_decode($request->getBody()->getContents());
        $movie->poster_path = $this->base_image_url . $movie->poster_path;
        $movie->release_date = str_before($movie->release_date, '-');
        $movie->budget = $this->moneyConvertion($movie->budget);
        $movie->revenue = $this->moneyConvertion($movie->revenue);

        $request = $this->client->get('https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key=757cc7494e774799984d5df49439f890');
        $casts = json_decode($request->getBody()->getContents());

        // $request = $client->get('https://hydramovies.com/streams/api/video-player.php?id='. $movie->imdb_id);
        // $streaming_url = $request->getBody()->getContents();
        $streaming_url = 'https://hydramovies.com/streams/api/video-player.php?id='. $movie->imdb_id;

        return view('movies.streaming')
            ->with('page', $this->page)
            ->with('menus', $this->menus)
            ->with('movie', $movie)
            ->with('casts', $casts)
            ->with('url', $streaming_url);
    }

    private function moneyConvertion($value)
    {
        if($value >= 1000000000){
            $value /=1000000000;
            return round($value, 2).'B';
        }else if($value >= 1000000 && $value < 1000000000){
            $value /= 1000000;
            return round($value, 2).'M';
        }else {
            return $value;
        }
    }
}
