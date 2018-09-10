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
                    {{ csrf_field() }}
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
                <span>Showing {{ count($movies) }} for {{ ucwords($search_data['title']) }} @if($search_data['year'] !== 0) ($search_data['year']) @endif</span>
            </div>
        </div>
    </div>
</section>

<section class="no-padding-top">
    <div class="container-fluid">
        <div class="card-columns">
            @foreach($movies as $movie)
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
