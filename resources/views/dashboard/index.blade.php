@extends('layouts.master')

@section('title')
Movies Dashboard
@endsection

@section('menu-title')
Dashboard
@endsection

@section('content')
<!-- Trending Movies                                                -->
<section class="updates">
    <div class="container-fluid">
        <div class="row">
            <!-- Daily Feeds -->
            <div class="col-lg-8">
                <div class="daily-feeds card">
                    <div class="card-header">
                        <h3 class="h4">Trending this week</h3>
                    </div>
                    <div class="card-body no-padding">
                        @foreach ($trending_movies as $key => $movie)
                        <!-- Item-->
                        <div class="item">
                            <div class="feed">
                                <div class="feed-body d-flex">
                                    <div class="trending-number">
                                        <h1>#{{ $key+1 }}</h1>
                                    </div>
                                    <div class="trending-content d-flex justify-content-betweent">
                                        <a href="{{ route('movie-streaming', [$movie->id]) }}" class="feed-profile">
                                            <img src="{{ $movie->poster_path }}" alt="person"class="img-fluid">
                                        </a>
                                        <div class="content">
                                            <a href="{{ route('movie-streaming', [$movie->id]) }}">
                                                <h4>{{ $movie->original_title }} ({{ $movie->release_date }})</h4>
                                            </a>
                                            <br>
                                            <span>Popularity: {{ $movie->popularity }} </span>
                                            <div class="full-date text-justify">
                                                <small>{{ $movie->overview }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-head">
                        <img class="card-img-top" src="{{ $trending_movies[0]->poster_path }}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h3 class="trending-title">{{ $trending_movies[0]->original_title }} ({{ $trending_movies[0]->release_date }})</h3>
                        <span class="font-orange">Popularity: {{ $trending_movies[0]->popularity }}</span>
                        <div class="trending-text text-justify mb-3">
                            <small>{{ $trending_movies[0]->overview }}</small>
                        </div>
                        <button type="button" class="btn btn-info"><i class="fa fa-film mr-2"></i>Trailer</button>
                        <a href="{{ route('movie-streaming', [$trending_movies[0]->id]) }}" class="btn btn-primary"><i class="fa fa-play mr-2"></i>Streaming</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
