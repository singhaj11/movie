@extends('layouts.app')

@section('content')
<!-- Start latest-post Area -->
<section class="latest-post-area mt-0 pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title">Latest Movies</h4>
                    @foreach($movies as $key => $movie)
                    <div class="single-latest-post row align-items-center">
                        <div class="col-lg-5 post-left">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('uploads/movies'). '/'. $movie->image }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 post-right">
                            <a href="image-post.html">
                                <h4>{{ $movie->title }}.</h4>
                            </a>
                            <ul class="meta">
                                <li>
                                    <a href="#"><span class="lnr lnr-calendar-full"></span>{{
                                        \Carbon\Carbon::parse($movie->release_date)->format('d F, Y') }}</a>
                                </li>
                                @guest
                                <li>
                                    <a href="{{ route('add_to_favourite', $movie->id) }}"><i class="fa fa-star-o"
                                            aria-hidden="true"></i> Favorite</a>
                                </li>
                                @else
                                <li>
                                    @if($movie->favourites->where('user_id', auth()->user()->id)->first())
                                    <a href="{{ route('remove_from_favourite', $movie->id) }}"><i class="fa fa-star"
                                            aria-hidden="true"></i> Liked</a>
                                    @else
                                    <a href="{{ route('add_to_favourite', $movie->id) }}"><i class="fa fa-star-o"
                                            aria-hidden="true"></i> Favorite</a>
                                    @endif
                                </li>
                                @endguest
                                <li>
                                    <a href="#" class="disabled"><i class="fa fa-heart" aria-hidden="true"></i> {{
                                        count($movie->favourites) }} Likes</a>
                                </li>
                            </ul>
                            <p class="excert">
                                {{ \Illuminate\Support\Str::limit($movie->description, 100, '...') }}.
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <div class="load-more">
                        {!! $movies->links('pagination') !!}
                    </div>

                </div>
                <!-- End latest-post Area -->
            </div>
        </div>
    </div>
</section>
<!-- End latest-post Area -->
@endsection