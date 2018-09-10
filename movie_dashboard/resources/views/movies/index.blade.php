@extends('layouts.master')

@section('title')
    Movie Collections
@endsection

@section('menu-title')
    Movie Collections
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
                <form action="{{ route('search-movie') }}" method="get" class="row">
                    <div class="col-md-8 form-group">
                        <input type="text" placeholder="Title (required)" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-2 form-group">
                        <input type="text" placeholder="Year (optional)" name="year" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </form>
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
                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="true">Popular</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-top-rated" role="tab" aria-controls="nav-top-rated" aria-selected="false">Top Rated</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-now-playing" role="tab" aria-controls="nav-now-playing" aria-selected="false">Now Playing</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-coming-soon" role="tab" aria-controls="nav-coming-soon" aria-selected="false">Coming Soon</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="no-padding-top">
    <div class="container-fluid">
        <div class="card-columns">
            <div class="tab-content">
                <!-- Popular Movies Tab -->
                <div class="tab-pane fade show active" id="nav-popular" role="tabpanel">
                    @foreach($popular as $movie)
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

                <!-- Top Rated Tab -->
                <div class="tab-pane fade" id="nav-top-rated" role="tabpanel">
                    @foreach($top_rated as $movie)
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

                <!-- Now Playing Tab -->
                <div class="tab-pane fade" id="nav-now-playing" role="tabpanel">
                    @foreach($now_playing as $movie)
                    <a href="{{ route('movie-streaming', [$movie->id]) }}" class="movie">
                        <div class="card animation">
                            <div class="card-head animation">
                                <img class="card-img-top" src="{{ $movie->poster_path }}" alt="{{ $movie->original_title }}">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $movie->original_title }} ({{ $movie->release_date }})</h4>
                                <p class="card-text">
                                    @if(isset($movie->genres))
                                        @foreach($movie->genres as $key => $genre)
                                            {{ $genre }}
                                            @if($key != count($movie->genres)-1)
                                                ,
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Coming Soon Tab -->
                <div class="tab-pane fade" id="nav-coming-soon" role="tabpanel">
                    @foreach($coming_soon as $movie)
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
        </div>
    </div>
</section>

@endsection
