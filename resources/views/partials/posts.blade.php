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
                                    <a href="{{ route('frontend.tag.show',$recent->tags->first()->nama_tag) }}" class="span hover-2"># {{ $tag->nama_tag }}</a>
                                    @endforeach
                                </div>

                                <div class="wrapper">
                                    <ion-icon name="time" aria-hidden="true"></ion-icon>

                                   
                                    <span class="span">{{ $recent->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach