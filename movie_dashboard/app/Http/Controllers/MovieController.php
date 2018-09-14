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
    private $base_image_url = 'https://image.tmdb.org/t/p/w185_and_h278_bestv2';
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
        $casts->cast = array_slice($casts->cast, 0, 12, true);

        foreach ($casts->cast as $cast) {
            $cast->profile_path = $this->base_image_url . $cast->profile_path;
        }

        $streaming_url = 'https://hydramovies.com/streams/api/video-player.php?id='.$movie->imdb_id;

        $request = $this->client->get('https://api.themoviedb.org/3/movie/'.$id.'/recommendations?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1');
        $recommendations = json_decode($request->getBody()->getContents());
        $recommendations->results = array_slice($recommendations->results, 0, 4, true);
        $request = $this->client->get('https://api.themoviedb.org/3/genre/movie/list?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $genre_response = json_decode($request->getBody()->getContents());

        foreach ($recommendations->results as $item) {
            foreach ($item->genre_ids as $genre_id) {
                foreach ($genre_response->genres as $genre) {
                    if($genre_id == $genre->id){
                        $item->genres[] = $genre->name;
                    }
                }
            }
            if(!isset($item->genres)){
                $item->genres = array();
            }
            $item->poster_path = $this->base_image_url . $item->poster_path;
            $item->release_date = str_before($item->release_date, '-');
        }

        $request = $this->client->get('https://api.themoviedb.org/3/movie/'.$id.'/videos?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $trailer = json_decode($request->getBody()->getContents());
        $trailer->results = array_slice($trailer->results, 0, 1, true);
        $trailer->results[0]->key = 'https://www.youtube.com/embed/' . $trailer->results[0]->key;

        $request = $this->client->get('https://api.themoviedb.org/3/movie/'.$id.'/reviews?api_key=757cc7494e774799984d5df49439f890&language=en-US&page=1');
        $reviews = json_decode($request->getBody()->getContents());
        $reviews->results = array_slice($reviews->results, 0, 4, true);
        foreach ($reviews->results as $review) {
            if(strlen($review->content) > 200){
                $review->content = substr($review->content,0,150) . '...';
                $review->isTrimmed = true;
            } else if($review->content == ''){
                unset($review);
            } else {
                $review->isTrimmed = false;
            }
        }

        return view('movies.streaming')
            ->with('page', $this->page)
            ->with('menus', $this->menus)
            ->with('movie', $movie)
            ->with('casts', $casts->cast)
            ->with('recommendations', $recommendations->results)
            ->with('url', $streaming_url)
            ->with('trailer', $trailer->results[0])
            ->with('reviews', $reviews->results);
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

    public function searchMovies(Request $request)
    {
        $year = 0;
        if(is_null($request->get('year')) && empty($request->get('year'))){
            $api_request = $this->client->get('https://api.themoviedb.org/3/search/movie?api_key=757cc7494e774799984d5df49439f890&query=' . $request->get('title') . '&include_adult=true');
        }else {
            $year = $request->get('year');
            $api_request = $this->client->get('https://api.themoviedb.org/3/search/movie?api_key=757cc7494e774799984d5df49439f890&query=' . $request->get('title') . '&include_adult=true&year=' . $request->get('year'));
        }
        $movies = json_decode($api_request->getBody()->getContents());
        $api_request = $this->client->get('https://api.themoviedb.org/3/genre/movie/list?api_key=757cc7494e774799984d5df49439f890&language=en-US');
        $genre_response = json_decode($api_request->getBody()->getContents());
        foreach ($movies->results as $item) {
            foreach ($item->genre_ids as $genre_id) {
                foreach ($genre_response->genres as $genre) {
                    if($genre_id == $genre->id){
                        $item->genres[] = $genre->name;
                    }
                }
            }
            if(!isset($item->genres)){
                $item->genres = array();
            }
            $item->poster_path = $this->base_image_url . $item->poster_path;
            $item->release_date = str_before($item->release_date, '-');
        }
        $search_data = array('title' => $request->get('title'), 'year' => $year);

        return view('movies.search-result')
            ->with('page', $this->page)
            ->with('menus', $this->menus)
            ->with('search_data', $search_data)
            ->with('movies', $movies->results);
    }

    public function searchYoutube() {
        $this->page = 'youtube';
        return view('movies.youtube')
            ->with('page', $this->page)
            ->with('menus', $this->menus);
    }

    public function test()
    {
        $items = array(
            array('parent_id' => 1, 'id' => 4, 'name' => 'Item 1'),
            array('parent_id' => 1, 'id' => 5, 'name' => 'Item 2')
        );

        $no_arr = array();
        $sections = array(
            array('parent_id' => 'null', 'id' => 1, 'name' => 'Section 1'),
            array('parent_id' => 'null', 'id' => 2, 'name' => 'Section 2')
        );
        $data = array();
        foreach ($sections as $key => $section) {
            array_push($data, $section);
            foreach ($items as $item) {
                if($section['id'] == $item['parent_id']){
                    $data[$key]['items'] = $item;
                }
            }
        }
        print_r($data);
        echo "<br><br>";
        return '';
    }
}
