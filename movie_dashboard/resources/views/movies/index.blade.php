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
            <div class="card-body mt-3">
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
            </div>
        </div>
    </div>
</section>
@endsection
