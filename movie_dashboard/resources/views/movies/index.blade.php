@extends('layouts.master')

@section('title')
Movie Streaming
@endsection

@section('menu-title')
Movie Streaming
@endsection

@section('content')


<!-- Search Form-->
<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Search Movie</h4>
            </div>
            <div class="card-body">
                <form class="row">
                    <div class="col-md-8 form-group">
                        <input type="text" placeholder="Title" class="form-control">
                    </div>
                    <div class="col-md-2 form-group">
                        <input type="text" placeholder="Year" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </form>
                <span>Showing 4 of 10 result for Iron Man, 2008</span>
            </div>
        </div>
    </div>
</section>

<!-- Popular Movies-->
<section class="no-padding">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <nav class="nav nav-pills nav-justified">
                    <a class="nav-item nav-link active" href="#">Popular</a>
                    <a class="nav-item nav-link" href="#">Top Rated</a>
                    <a class="nav-item nav-link" href="#">Now Playing</a>
                    <a class="nav-item nav-link" href="#">Coming Soon</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="no-padding-top">
    <div class="container-fluid">
        <div class="card-columns">
            @foreach($trending_movies as $movie)
            <a href="{{ route('movie-streaming', [$movie->id]) }}" class="movie">
                <div class="card animation">
                    <div class="card-head animation">
                        <img class="card-img-top" src="{{ $movie->poster_path }}" alt="{{ $movie->original_title }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $movie->original_title }} ({{ $movie->release_date }})</h4>
                        <p class="card-text">
                            @foreach($movie->genres as $key => $genre)
                                {{ $genre }}
                                @if($key != count($movie->genres)-1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
