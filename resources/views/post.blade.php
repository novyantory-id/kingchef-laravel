@extends('layout')

@section('content')

<section class="section article-post" id="article" aria-labelledby="recent-label">

    <div class="container">
        <div class="post-main">

            {{-- Disini kontennya --}}

            <div class="post-card">
                <div class="card-content">
                    @if ($post->categories->count() > 0)
                    <a href="{{ route('frontend.category.show',$post->categories->first()->slug_kategori) }}" class="card-badge">{{ $post->categories->first()->nama_kategori }}</a>
                    @endif
                </div>
            </div>

            <h2 class="headline headline-2 section-title">
                <span class="span">{{ $post->title_post }}</span>
            </h2>

            <div class="post-wrapper">
                <div class="card-post">
                    <ion-icon name="person"></ion-icon>
                    <p>{{ $post->user->username }}</p>
                </div>

                <div class="wrapper">
                    <p>/</p>
                </div>

                <div class="wrapper">
                    <ion-icon name="time"></ion-icon>
                    <time datetime="" class="publish-date">{{ $post->created_at->format('F j, Y, H:i') }}</time>
                </div>
            </div>

            <div class="post-content" style="overflow: hidden;">
                <img src="{{ asset('storage/thumbnails/'.$post->thumbnail_post) }} " width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding">
            </div>
            

            <div class="post-content" style="overflow: hidden;">

                <div class="ql-editor">
                    {!! $post->content_post !!}
                </div>

                
            </div>

            <div class="post-card">
                <div class="card-content">
                    <div class="warpper">
                        <p>Tags:</p>
                        @foreach ($post->tags as $tag)
                        <p class="card-subtitle">#{{ $tag->nama_tag }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="post-aside grid-list">
            <div class="card aside-card">
                <h3 class="headline headline-2 aside-title">
                    <span class="span">Similiar Posts</span>
                </h3>

                <ul class="popular-list">
                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/dendeng.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/opor.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/rendang.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card aside-card">
                <h3 class="headline headline-2 aside-title">
                    <span class="span">Popular Posts</span>
                </h3>

                <ul class="popular-list">
                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/dendeng.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/opor.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="popular-card">
                            <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                <img src="{{ asset('assets/img/frontend/rendang.jpg') }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                            </figure>

                            <div class="card-content">
                                <h4 class="headline headline-4 card-title">
                                    <a href="#" class="link hover-2">Creating is a privilege but it's also a gift</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">15 mins read</p>

                                    <time datetime="2025-04-03" class="publish-date">15 April 2022</time>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card aside-card insta-card">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/img/kingchef.png') }} " width="119" height="37" loading="lazy" alt="King Chef">
                </a>

                <p class="card-text">
                    Follow us on instagram
                </p>

                <ul class="insta-list">
                    <li>
                        <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                            <img src="{{ asset('assets/img/frontend/instagram.svg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                        </a>
                    </li>

                    <li>
                        <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                            <img src="{{ asset('assets/img/frontend/instagram.svg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>



@endsection