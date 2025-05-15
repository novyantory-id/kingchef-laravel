<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Novyantory Blogger</title>
        <meta name="title" content="Novblog - Novyantory Blogger" />
        <meta
            name="description"
            content="This is a blog recipe by novyantory"
        />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            href="{{ asset('assets/img/img-icon.png') }} "
            type="image/x-icon"
        />

        <!-- ionicon -->
        <link
            href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
            rel="stylesheet"
        />

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('assets/css/frontend-style.css') }} " />

        <!-- preload images -->
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/opor.jpg') }} "
        />
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/dendeng.jpg') }} "
        />
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/rendang.jpg') }} "
        />
    </head>
    <body id="#top">
    <!-- 
        - #HEADER 
        -->

        <header class="header" data-header>
            <div class="container">
                <a href="#" class="logo">
                    <img
                        src="{{ asset('assets/img/kingchef.png') }} "
                        height="100"
                        width="100"
                        alt="NovFood"
                    />
                </a>

                <nav class="navbar" data-navbar>
                    <div class="navbar-top">
                        <a href="#" class="logo">
                            <img
                                src="{{ asset('assets/img/kingchef.png') }} "
                                height="50"
                                width="70"
                                alt="NovFood"
                            />
                        </a>

                        <button
                            class="nav-close-btn"
                            aria-label="close menu"
                            data-nav-toggler
                        >
                            <ion-icon
                                name="close"
                                aria-hidden="true"
                            ></ion-icon>
                        </button>
                    </div>

                    <ul class="navbar-list">
                        <li>
                            <a
                                href="#hero"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Home</a
                            >
                            </li>
                            <li>
                                <a
                                href="#topics"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Topics</a
                            >
                            </li>
                            <li>
                                <a
                                href="#featured"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Featured</a
                            >
                            </li>
                            <li>
                                <a
                                href="#recent"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Recent Post</a
                            >
                            </li>
                            <li>
                                <a
                                href="#contact"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Contact</a
                            >
                            </li>
                    </ul>
                    
                </nav>

                <a href="#" class="btn btn-primary">Subscribe</a>

                <button
                    class="nav-open-btn"
                    aria-label="open menu"
                    data-nav-toggler
                >
                    <ion-icon name="menu" aria-hidden="true"></ion-icon>
                </button>
            </div>
        </header>

        <main>
            <article>

            <!-- 
            - #HERO 
            -->

            <section class="hero" id="hero" aria-label="home">
                <div class="container">

                    <div class="hero-content">

                        <p class="hero-subtitle">Hello Everyone!</p>

                        <h1 class="headline headline-1 section-title">
                            I'm <span class="span">King Chef</span>
                        </h1>

                        <p class="hero-text">
                            King Chef shares authentic and innovative recipes through a web platform, inspiring food lovers with traditional and fusion dishes while building a creative and eco-conscious cooking community.
                        </p>

                        <div class="input-wrapper">
                            <input id="userEmail" type="email" name="email_address" placeholder="Type your email address" id="" class="input-field" required>

                            <button class="btn btn-primary">
                                <span class="span">Subscribe</span>
                                <ion-icon
                                        name="arrow-forward"
                                        aria-hidden="true"
                                    ></ion-icon>
                            </button>

                        </div>

                    </div>

                    <div class="hero-banner">

                        <img src="{{ asset('assets/img/frontend/herochef.png') }} " alt="Chef King" width="327" height="480" class="w-100">

                        <img src="{{ asset('assets/svg/spatula-cooking-svgrepo-com.svg') }} " width="50" height="49" alt="shape" class="shape shape-1">

                        <img src="{{ asset('assets/svg/kitchen-knife-svgrepo-com.svg') }} " width="50" height="49" alt="shape" class="shape shape-2">
                    </div>

                    <img src="{{ asset('assets/svg/shadow-1.svg') }} " width="500" height="800" alt="" class="hero-bg hero-bg-1">

                    <img src="{{ asset('assets/svg/shadow-2.svg') }} " width="500" height="800" alt="" class="hero-bg hero-bg-2">
                </div>
            </section>
            

            <!-- 
            - #TOPICS 
            -->

            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">
                    <div class="card topic-card">
                        <div class="card-content">
                            <h2
                                class="headline headline-2 section-title card-title"
                                id="topic-label"
                            >
                                Hot Topics
                            </h2>

                            <p class="card-text">
                                Don't miss out on the latest news about Recipte
                                tips, Food Heaven, Food Review...
                            </p>

                            <div class="btn-group">
                                <button
                                    class="btn-icon"
                                    aria-label="prev"
                                    data-slider-prev
                                >
                                <ion-icon
                                        name="arrow-back"
                                        aria-hidden="true"
                                    ></ion-icon>
                                </button>
                                <button
                                    class="btn-icon"
                                    aria-label="next"
                                    data-slider-next
                                >
                                <ion-icon
                                        name="arrow-forward"
                                        aria-hidden="true"
                                    ></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="slider" data-slider>
                            <ul class="slider-list" data-slider-container>
                                
                                @foreach ($mostPopularCategories as $category)
                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure
                                            class="slider-banner img-holder"
                                            style="--width: ; --height: "
                                        >
                                        @if ($category->posts->isNotEmpty() && $category->posts[0]->thumbnail_post)
                                            <img
                                            src="{{ asset('storage/categorytag/'.$category->gambar_kategori) }} "
                                            width="507"
                                            height="618"
                                            loading="lazy"
                                            alt="category img"
                                            class="img-cover"
                                            />
                                        @else
                                        <img
                                            src="{{ asset('assets/img/frontend/default-food.jpg') }} "
                                            width="507"
                                            height="618"
                                            loading="lazy"
                                            alt="category img"
                                            class="img-cover"
                                            />
                                        @endif
                                            
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title"
                                                >{{ $category->nama_kategori }}</span
                                            >
                                            <p class="slider-subtitle">
                                                {{ $category->posts_count }} Articles
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 
            - #TOPICS 
            -->

            <section class="section feature" aria-label="feature" id="featured">
                <div class="container">

                    <h2 class="headline headline-2 section-title">
                        <span class="span">Editor's picked</span>
                    </h2>

                    <p class="section-text">
                        Featured and highly rated articles
                    </p>

                    <ul class="feature-list">

                        @foreach ($editorPicked as $post)
                        
                        <li>
                            <div class="card feature-card">

                                <figure class="card-banner img-holder" style="--width:1602; --height:903;">

                                    @if ($post->thumbnail_post)
                                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail_post) }} " width="1602" height="903" loading="lazy" alt="Thumbnail" class="img-cover">  
                                    @else
                                    <img src="{{ asset('assets/img/frontend/rendang.jpg') }} " width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover">
                                    @endif
                                </figure>

                                <div class="card-content">

                                    <div class="card-wrapper">
                                        <div class="card-tag">

                                            @foreach ($post->tags as $tag)    
                                            <a href="{{ route('frontend.tag.show',$post->tags->first()->nama_tag) }}" class="span hover-2">#{{ $tag->nama_tag }} </a>
                                            @endforeach
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time" aria-hidden="true"></ion-icon>
        
                                            <span class="span">{{ $post->published_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="{{ route('frontend.article.show',$post->slug_post) }}" class="card-title hover-2">{{ $post->title_post }}</a>
                                    </h3>

                                    <div class="card-wrapper">

                                        <div class="profile-card">

                                            @if($post->user->avatar)
                                            <img src="{{ asset('storage/profile/'.$post->user->avatar) }} " width="48" height="48" loading="lazy" alt="Avatar" class="profile-banner">
                                            @else
                                            <img src="{{ asset('assets/img/frontend/default.png') }} " width="48" height="48" loading="lazy" alt="Avatar" class="profile-banner">
                                            @endif

                                            <div>
                                                <p class="card-title"><a href="{{ route('frontend.author.show',$post->user->username) }}" class="card-title hover-2">{{ $post->user->username }}</a></p>

                                                <p class="card-subtitle">{{ $post->published_at->format('d M Y') }}</p>
                                            </div>
                                        </div>

                                        <a href="#" class="card-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                        
                    </ul>

                    {{-- <a href="{{ route('frontend.articles.show') }}" class="btn btn-secondary">
                        <span class="span">Show More Post</span>

                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a> --}}
                </div>

                <img src="{{ asset('assets/svg/shadow-3.svg') }} " width="500" height="1500" loading="lazy" alt="" class="feature-bg">
            </section>

            <!-- 
            - #POPULAR TAGS 
            -->

            <section class="tags" aria-labelledby="tag-label">
                <div class="container">
                    <h2 class="headline-2 section-title" id="tag-label">
                        <span class="span">Popular Tags</span>
                    </h2>

                    <p class="section-text">Most searched keywords</p>

                    <ul class="grid-list">
                        @foreach ($tagPopulars as $tag)
                            
                        
                        <li>
                            <button class="card tag-btn">
                                <img src="{{ asset('assets/img/frontend/goreng.png') }} " width="32" height="32" loading="lazy" alt="Goreng">

                                <p class="btn-text">{{ $tag->nama_tag }}</p>
                            </button>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </section>

            <!-- 
            - #RECENT POST 
            -->

            <section class="section recent-post" id="recent" aria-labelledby="recent-label">

                <div class="container">
                    <div class="post-main">

                        <h2 class="headline headline-2 section-title">
                            <span class="span">Recent posts</span>
                        </h2>
        
                        <p class="section-text">
                            Don't miss the latest trends
                        </p>
        
                        <ul class="grid-list">

                            @foreach ($recents as $recent)
                                
                            <li>
                                <div class="recent-post-card">
        
                                    <figure class="card-banner img-holder" style="--width:271; --height:258;">

                                        @if ($recent->thumbnail_post)
                                        <img src="{{ asset('storage/thumbnails/'.$recent->thumbnail_post) }} " width="271" height="258" loading="lazy" alt="Thumbnail" class="img-cover">    
                                        @else
                                        <img src="{{ asset('assets/img/frontend/blank.jpg') }} " width="271" height="258" loading="lazy" alt="Thumbnail" class="img-cover">

                                        @endif
                                    </figure>
        
                                    <div class="card-content">
                                        @if ($recent->categories->count() > 0)
                                            
                                        {{-- <a href="{{ route('frontend.categories.show', $recent->categories->first()->slug) }}" class="card-badge">
                                            {{ $recent->categories->first()->name }}
                                        </a> --}}

                                        <a href="{{ route('frontend.category.show',$recent->categories->first()->slug_kategori) }}" class="card-badge">{{ $recent->categories->first()->nama_kategori }}</a>
                                        
                                        @endif
        
                                        <h3 class="headline headline-3 card-title">
                                            <a href="{{ route('frontend.article.show',$recent->slug_post) }}" class="link hover-2">{{ $recent->title_post }}</a>
                                        </h3>
        
                                        <p class="card-text">{{ Str::limit(strip_tags($recent->content_post),100) }}</p>
        
                                        <div class="card-wrapper">
                                            <div class="card-tag">

                                                @foreach ($recent->tags as $tag)
                                                <a href="{{ route('frontend.tag.show',$recent->tags->first()->nama_tag) }}" class="span hover-2">#{{ $tag->nama_tag }} </a>
                                                @endforeach
                                            </div>
        
                                            <div class="wrapper">
                                                <ion-icon name="time" aria-hidden="true"></ion-icon>
        
                                               
                                                <span class="span">{{ $recent->published_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
        
                        {{-- <nav aria-label="pagination" class="pagination">
                            <a href="#" class="pagination-btn" aria-label="previous page">
                                <ion-icon
                                            name="arrow-back"
                                            aria-hidden="true"
                                        ></ion-icon>
                            </a>
        
                            <a href="#" class="pagination-btn">1</a>
                            <a href="#" class="pagination-btn">2</a>
                            <a href="#" class="pagination-btn">3</a>
                            <a href="#" class="pagination-btn" aria-label="more page">...</a>
        
                            <a href="#" class="pagination-btn" aria-label="next page">
                                <ion-icon
                                            name="arrow-forward"
                                            aria-hidden="true"
                                        ></ion-icon>
                            </a>
                            
                        </nav> --}}

                        <a href="{{ route('frontend.articles.show') }}" class="btn btn-secondary">
                            <span class="span">Show More Post</span>
    
                            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                        </a>

                    </div>
        
                    <div class="post-aside grid-list">
                        <div class="card aside-card">
                            <h3 class="headline headline-2 aside-title">
                                <span class="span">Popular Posts</span>
                            </h3>
        
                            <ul class="popular-list">
        
                                @foreach ($populars as $popular)
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64; --height:64;">
                                            <img src="{{ asset('storage/thumbnails/'.$popular->thumbnail_post) }} " alt="" width="64" height="64" loading="lazy" class="img-cover">
                                        </figure>
        
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">{{ $popular->title_post }}</a>
                                            </h4>
        
                                            <div class="warpper">
                                                <p class="card-subtitle">{{ $popular->published_at->diffForHumans() }}</p>
        
                                                <time datetime="2025-04-03" class="publish-date">{{ $popular->published_at->format('d M Y') }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
        
                        {{-- <div class="card aside-card">
                            <h3 class="headline headline-2 aside-title">
                                <span class="span">Last Comment</span>
                            </h3>
        
                            <ul class="comment-list">
                                <li>
                                    <div class="comment-card">
                                        <blockquote class="card-text">
                                            " Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, quam cum. "
                                        </blockquote>
        
                                        <div class="profile-card">
                                            <figure class="profile-banner img-holder">
                                                <img src="{{ asset('assets/img/frontend/author.jpg') }} " width="32" height="32" loading="lazy" alt="Mamank Racing" class="img-cover">
                                            </figure>
                                            <div>
                                                <p class="card-title">Mamank Racing</p>
        
                                                <time datetime="2025-04-03" class="card-date">03 April 2025</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
        
                                <li>
                                    <div class="comment-card">
                                        <blockquote class="card-text">
                                            " Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, quam cum. "
                                        </blockquote>
        
                                        <div class="profile-card">
                                            <figure class="profile-banner img-holder">
                                                <img src="{{ asset('assets/img/frontend/author.jpg') }} " width="32" height="32" loading="lazy" alt="Mamank Racing" class="img-cover">
                                            </figure>
                                            <div>
                                                <p class="card-title">Pak Vincent Dua Orang</p>
        
                                                <time datetime="2025-04-03" class="card-date">03 April 2025</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
        
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
                                        <img src="{{ asset('assets/img/frontend/ig-1.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>
        
                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-2.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-3.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-4.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-5.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-6.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-7.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-8.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" style="--width:276; --height:277;" class="insta-post img-holder">
                                        <img src="{{ asset('assets/img/frontend/ig-9.jpg') }} " width="276" height="277" alt="insta-post" class="img-cover">
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </section>
         
            </article>
        </main>

         <!-- 
         - #FOOTER 
         -->

         <footer id="contact">
            <div class="container">
                <div class="card footer">
                    <div class="section footer-top">

                        <div class="footer-brand">
                            <a href="#" class="logo">
                                <img src="{{ asset('assets/img/kingchef.png') }} " width="119" height="37" loading="lazy" alt="King Chef">
                            </a>

                            <p class="footer-text">
                                The character names, website name, and theme on this platform are purely fictional. The content shared is not the original work of the website owner.
                            </p>

                            <p class="footer-list-title">Address</p>

                            <address class="footer-text address">
                                Padat Karya Street
                                South Lampung, ID 35362
                            </address>
                        </div>

                        <div class="footer-list">

                            <p class="footer-list-title">Categories</p>

                            <ul>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Utama</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Pembuka</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Penutup</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Masakan Indonesia</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Camilan</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Minuman</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Resep</a>
                                </li>
                            </ul>
                        </div>

                        <div class="footer-list">

                            <p class="footer-list-title">Newsletter</p>

                            <p class="footer-text">
                                Please contact us if you have any suggestions regarding dishes or interesting culinary ideas to share.
                            </p>

                            <div class="input-wrapper">
                                <input type="text" name="name" placeholder="Your name" id="fullName" class="input-field" autocomplete="off" required>

                                <ion-icon name="person" aria-hidden="true"></ion-icon>
                            </div>

                            <div class="input-wrapper">
                                <input type="email" name="email_address" placeholder="Your email" id="userEmail" class="input-field" autocomplete="off" required>

                                <ion-icon name="mail" aria-hidden="true"></ion-icon>
                            </div>

                            <a href="#" class="btn btn-primary" onclick="sendEmail()">
                                <span class="span">Contact Us</span>

                                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>    
                            </a>
                        </div>

                    </div>

                    <div class="footer-bottom">

                        <p class="copyright">
                            &copy; Developed by <a href="#" class="copyright-link">Novyantory</a>
                        </p>

                        <p class="copyright">
                            &copy; Designed by <a href="https://youtube.com/@codewithsadee" class="copyright-link">codewithsadee</a>
                        </p>

                    </div>

                    <ul class="social-list">

                        <li>
                            <a href="https://x.com/novyantory" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>

                                <span class="span">Twitter</span>
                            </a>
                        </li>

                        <li>
                            <a href="https://instagram.com/novyantory" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>

                                <span class="span">Instagram</span>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-github"></ion-icon>

                                <span class="span">Github</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
         </footer>

        <!-- 
         - #BACK TO TOP 
         -->

         <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
            <ion-icon name="arrow-round-up" aria-hidden="true"></ion-icon>
         </a>

        <!-- Ionicons link -->
        <script src="{{ asset('assets/js/frontend-main.js') }} "></script>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        <script>
            function sendEmail() {
                let userEmail = document.getElementById("userEmail");
                let fullName = document.getElementById("fullName").value;
                let myEmail = "bolongsandal42@gmail.com";
                let subject = `${fullName} - My Question`;
                let body = "Silahkan masukkan pesan anda...";

                if (userEmail) {
                    let mailtoLink = `https://mail.google.com/mail/?view=cm&fs=1&to=${myEmail}&su=${encodeURIComponent(
                    subject
                    )}&body=${encodeURIComponent(body)}&bbc=${userEmail}`;
                    window.open(mailtoLink, "_blank");
                } else {
                    alert("Masukin emailnya dulu, Sob!");
                }
            }
        </script>
    </body>
</html>
