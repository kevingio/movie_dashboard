@extends('layouts.master')

@section('title')
Movie Streaming
@endsection

@section('menu-title')
Movie Streaming
@endsection

@section('content')

<section class="no-padding-bottom">
    <!-- Inline Form-->
    <div class="col-lg-12">
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

<!-- Search Result -->
<div class="col-lg-12 mb-5">
    <div class="card-columns">
        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Popular Movies-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4>Popular Movies</h4>
        </div>
    </div>
</div>

<div class="col-lg-12 mb-5">
    <div class="card-columns">
        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>

        <a href="{{ route('movie-streaming') }}" class="movie">
            <div class="card animation">
                <div class="card-head animation">
                    <img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/inVq3FRqcYIRl2la8iZikYYxFNR.jpg" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Movie Title</h4>
                    <p class="card-text">Action, Horror, Romance</p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
