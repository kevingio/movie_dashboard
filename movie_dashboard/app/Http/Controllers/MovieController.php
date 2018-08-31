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
        $request = $this->client->get('https://api.themoviedb.org/3/genre/movie/list?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $genre_response = json_decode($request->getBody()->getContents());

        $request = $this->client->get('https://api.themoviedb.org/3/movie/popular?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1&region=ID');
        $popular = json_decode($request->getBody()->getContents());

        foreach ($popular->results as $movie) {
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

        $request = $this->client->get('https://api.themoviedb.org/3/movie/top_rated?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1&region=ID');
        $top_rated = json_decode($request->getBody()->getContents());

        foreach ($top_rated->results as $movie) {
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

        $request = $this->client->get('https://api.themoviedb.org/3/movie/now_playing?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1&region=ID');
        $now_playing = json_decode($request->getBody()->getContents());

        foreach ($now_playing->results as $movie) {
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

        $request = $this->client->get('https://api.themoviedb.org/3/movie/upcoming?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1&region=ID');
        $upcoming = json_decode($request->getBody()->getContents());

        foreach ($upcoming->results as $movie) {
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
            ->with('popular', $popular->results)
            ->with('top_rated', $top_rated->results)
            ->with('now_playing', $now_playing->results)
            ->with('coming_soon', $upcoming->results);
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
