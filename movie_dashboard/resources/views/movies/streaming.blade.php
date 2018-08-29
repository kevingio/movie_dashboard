@extends('layouts.master')

@section('title')
Movie Streaming
@endsection

@section('menu-title')
Iron Man (2008)
@endsection

@section('content')

<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('movie') }}">Movie Streaming</a></li>
    <li class="breadcrumb-item active">Iron Man</li>
  </ul>
</div>

<section class="no-padding-bottom">
    <!-- Inline Form-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <iframe src="https://oload.stream/embed/NvOa5bPc6t4" width="100%" height="400px"></iframe>
                    </div>
                    <div class="col-lg-6">
                        <h2>Sinopsis</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <h2>Cast</h2>
                        <p>Robert Downey Jr.</p>
                        <h2>Rating</h2>
                        <p>6.7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
