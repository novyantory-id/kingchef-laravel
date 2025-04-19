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