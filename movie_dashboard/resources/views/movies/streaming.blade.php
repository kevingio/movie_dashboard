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
    <li class="breadcrumb-item active">Iron Man (2008)</li>
  </ul>
</div>

<section class="no-padding-bottom">
    <!-- Inline Form-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <iframe src="https://oload.stream/embed/NvOa5bPc6t4" class="mb-3" width="100%" height="400px" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                    </div>
                    <div class="col-lg-6">
                        <h2>Storyline</h2>
                        <p class="text-justify">
                            Tony Stark. Genius, billionaire, playboy, philanthropist. Son of legendary inventor and weapons contractor Howard Stark. When Tony Stark is assigned to give a weapons presentation to an Iraqi unit led by Lt. Col. James Rhodes, he's given a ride on enemy lines. That ride ends badly when Stark's Humvee that he's riding in is attacked by enemy combatants. He survives - barely - with a chest full of shrapnel and a car battery attached to his heart. In order to survive he comes up with a way to miniaturize the battery and figures out that the battery can power something else. Thus Iron Man is born. He uses the primitive device to escape from the cave in Iraq. Once back home, he then begins work on perfecting the Iron Man suit. But the man who was put in charge of Stark Industries has plans of his own to take over Tony's technology for other matters.
                        </p>
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
