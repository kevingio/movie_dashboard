@extends('layouts.master')

@section('title')
    Search YouTube
@endsection

@section('menu-title')
    Search YouTube
@endsection

@section('content')


<!-- Search Form-->
<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="card">
            <form id="yt-search">
                <div class="card-body row">
                    <div class="col-md-10">
                        <input type="text" placeholder="Search a movie" id="query" class="form-control" required>
                    </div>
                    <div class="col-md-2 mt-2 mt-md-0">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="results">
    <div class="container-fluid">
        <div class="row" id="yt-search-results">
            
        </div>
    </div>
</div>
@endsection
