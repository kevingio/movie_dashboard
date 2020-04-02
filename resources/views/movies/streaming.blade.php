@extends('layouts.master')

@section('title')
    {{ $movie->original_title }} ({{ $movie->release_date }})
@endsection

@section('menu-title')
    {{ $movie->original_title }} ({{ $movie->release_date }})
@endsection

@section('content')

<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('movie') }}">Movie Collections</a></li>
    <li class="breadcrumb-item active">{{ $movie->original_title }} ({{ $movie->release_date }})</li>
  </ul>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="card-img-top img-fluid mb-3" src="{{ $movie->poster_path }}" alt="{{ $movie->original_title }}">
                    </div>
                    <div class="col-lg-8">
                        <h2>Storyline</h2>
                        <p class="text-justify">
                            {{ $movie->overview }}
                        </p>

                        <h2>Genre</h2>
                        <p>
                            @foreach($movie->genres as $key => $genre)
                                {{ $genre->name }}
                                @if($key !== count($movie->genres)-1)
                                    ,
                                @endif
                            @endforeach
                        </p>
                        @if(isset($trailer) && !empty($trailer))
                            <h2>Trailer</h2>
                            <div class="row">
                                <div class="col-md-8">
                                    <iframe src="{{ $trailer->key }}" class="trailer"></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-money"></i></div>
                    <div class="title">
                        <span>Budget</span>
                        <br>
                        <span class="revenue"> USD {{ $movie->budget }}</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                    <div class="title">
                        <span>Revenue</span>
                        <br>
                        <span class="revenue"> USD {{ $movie->revenue }}</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-star"></i></div>
                    <div class="title">
                        <span>Rating</span>
                        <br>
                        <span class="revenue">{{ $movie->vote_average }}</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-yellow"><i class="fa fa-rss"></i></div>
                    <div class="title">
                        <span>Popularity</span>
                        <span class="revenue">{{ $movie->popularity }}</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-yellow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Movie Casts -->
<section class="no-padding" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Casts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($casts as $key => $cast)
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-head">
                            <img src="{{ $cast->profile_path }}" class="img-fluid" style="width: 100%;" alt="{{ $cast->name }}">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="mt-3">{{ $cast->character }}</h4>
                            <span>{{ $cast->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Movie Streaming -->
<section>
    <div class="container-fluid">
        <iframe src="{{ $url }}" id="test" width="100%" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
    </div>
</section>

<!-- Movie Recommendations -->
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Recommendations</h2>
            </div>
        </div>
        <div class="card-columns">
            @foreach($recommendations as $movie)
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

<!--  Movie Reviews -->
<section class="no-padding-top">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if(!empty($reviews))
                    <h2>Reviews</h2>
                @else
                    <h2>No Reviews</h2>
                @endif
            </div>
        </div>

        <div class="card-columns reviews">
            @foreach($reviews as $review)
            <div class="card">
                <div class="card-body text-justify">
                    {!! $review->content !!} - <strong>{{ $review->author }}</strong>
                    @if($review->isTrimmed)
                    <div class="text-center mt-3">
                        <a href="{{ $review->url }}" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
