@extends('layout')

@section('content')

<section class="section recent-post" id="recent" aria-labelledby="recent-label">

    <div class="container">
        <div class="post-main">

            <h2 class="headline headline-2 section-title">
                <span class="span">Categories</span>
            </h2>

            <p class="section-text">
                Kategori: {{ $category->nama_kategori }}
            </p>

            <ul class="grid-list">

                @foreach ($posts as $post)
                    
                <li>
                    <div class="recent-post-card">

                        <figure class="card-banner img-holder" style="--width:271; --height:258;">

                            @if ($post->thumbnail_post)
                            <img src="{{ asset('storage/thumbnails/'.$post->thumbnail_post) }} " width="271" height="258" loading="lazy" alt="Thumbnail" class="img-cover">    
                            @else
                            <img src="{{ asset('assets/img/frontend/blank.jpg') }} " width="271" height="258" loading="lazy" alt="Thumbnail" class="img-cover">

                            @endif
                        </figure>

                        <div class="card-content">
                            <div class="card-categories">
                                <ion-icon name="person"></ion-icon>
                                <p>{{ $post->user->username }}</p>

                                
                            </div>

                            <h3 class="headline headline-3 card-title-categories">
                                <a href="{{ route('frontend.article.show',$post->slug_post) }}" class="link hover-2">{{ $post->title_post }}</a>
                            </h3>

                            <p class="card-text">{{ Str::limit(strip_tags($post->content_post),100) }}</p>

                            <div class="card-wrapper">
                                <div class="card-tag">

                                    @foreach ($post->tags as $tag)
                                    <a href="{{ route('frontend.tag.show',$post->tags->first()->nama_tag) }}" class="span hover-2"># {{ $tag->nama_tag }}</a>
                                    @endforeach
                                </div>

                                <div class="wrapper">
                                    <ion-icon name="time" aria-hidden="true"></ion-icon>

                                   
                                    <span class="span">{{ $post->created_at->format('F j, Y') }}</span>
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

            <!-- Tombol Load More (hanya muncul jika ada halaman berikutnya) -->
            @if ($posts->hasMorePages())

            <!-- data-next-page << Simpan nomor halaman berikutnya -->
            <button id="load-more-posts" class="btn btn-secondary"
                data-next-page="{{ $posts->currentPage() + 1 }}"
                data-url="{{ route('frontend.category.show',$category->slug_kategori) }}">
                <span class="span">Load More</span>
            </button>
                
            {{-- <a href="{{ route('frontend.articles.show') }}" class="btn btn-secondary">
                <span class="span">Show More Post</span>
                
                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a> --}}
            
            @endif

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
                                    <a href="{{ route('frontend.article.show',$post->slug_post) }}" class="link hover-2">{{ $popular->title_post }}</a>
                                </h4>

                                <div class="warpper">
                                    <p class="card-subtitle">{{ $popular->created_at->diffForHumans() }}</p>

                                    <time datetime="2025-04-03" class="publish-date">{{ $popular->created_at->format('d M Y') }}</time>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>

        </div>
    </div>
</section>

<script>
    document.getElementById('load-more-posts')?.addEventListener('click', async function() {
    const button = this;
    button.disabled = true;
    button.innerHTML = 'Loading...'; // << Feedback visual

    try {
        // << Kirim request AJAX untuk halaman berikutnya
        const response = await fetch(`${button.dataset.url}?page=${button.dataset.nextPage}`, {
            headers: { 
                'X-Requested-With': 'XMLHttpRequest', // << Flag khusus untuk deteksi AJAX
                'Accept': 'application/json'
            }
        });
        
        const data = await response.json();
        
        // << Tambahkan HTML baru ke list
        document.querySelector('.grid-list').insertAdjacentHTML('beforeend', data.html);
        
        // << Update tombol atau sembunyikan jika sudah akhir
        if (data.hasMore) {
            button.dataset.nextPage = parseInt(button.dataset.nextPage) + 1;
            button.disabled = false;
            button.innerHTML = 'Load More';
        } else {
            button.remove();
        }
    } catch (error) {
        console.error('Error:', error);
        button.innerHTML = 'Error! Click to Retry';
        button.onclick = () => location.reload(); // << Fallback jika error
    }
});
</script>

@endsection