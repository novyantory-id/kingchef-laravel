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
                            @if ($post->categories->count() > 0)
                                
                            {{-- <a href="{{ route('frontend.categories.show', $post->categories->first()->slug) }}" class="card-badge">
                                {{ $post->categories->first()->name }}
                            </a> --}}

                            <a href="{{ route('frontend.category.show',$post->categories->first()->slug_kategori) }}" class="card-badge">{{ $post->categories->first()->nama_kategori }}</a>
                            
                            @endif

                            <h3 class="headline headline-3 card-title">
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

                                   
                                    <span class="span">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach