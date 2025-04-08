@extends('admin.layout')

@section('content')

<!-- Browser Default Validation -->
    <form action="" method="POST" class="row g-3 custom-card-fs" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="col-xl-8 col-md-12 col-sm-12">
        <div class="mb-2">
            <input type="text" name="title_post" class="form-control"  placeholder="Enter title here" value="{{ $post->title_post }}" >
            @error('title_post')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-2">
            <textarea name="content_post" value="{{ old('content_post') }}" class="form-control quill-editor-full bg-light" id="" cols="30" rows="10" placeholder="Enter title here">{{ $post->content_post }}</textarea>
            @error('content_post')
                <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div> --}}
        
        <div class="mb-2">
            
            <div id="quill-editor" style="height: 300px;">{!! old('content_post', $post->content_post) !!}</div>
            <input type="hidden" name="content_post" id="content_post" value="{{ old('content_post', $post->content_post) }}">
              
        </div>
        
        <div class="dropdown-post">
            <div class="dropdown-button-post" onclick="toggleDropdown(this)">
                <p>Post Settings</p>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="dropdown-content-post">
                <div class="my-2">
                    <input type="text" name="keyword_post" id="inputForSlug" class="form-control" oninput="slugUpdate()" placeholder="Enter keyword here" value="{{ $post->keyword_post }}" >
                    @error('keyword_post')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="mb-2">
                    <input type="text" name="slug_post" id="slugForInput" class="form-control" value="{{ $post->slug_post }}" readonly>
                    @error('slug_post')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
      </div>

      <div class="col-xl-4 col-md-12 col-sm-12 d-flex flex-column">
        <div class="card order-xl-first order-sm-last publish-card-mobile">
            <div class="card-header">
                Publish
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    @if ($post->status_post !== 'publish')
                    <button type="submit" name="action" value="save_draft" class="btn btn-light w-0.5 border mb-2">Save Draft</button>
                    @endif
                    <button type="submit" class="btn btn-light w-0.5 border mb-2">Preview</button>
                </div>
                <div class="d-flex gap-2">
                    <i class="bi bi-info-square"></i>
                    <p> Status:
                        @if ($post->status_post === 'publish')
                            Published
                            @else
                            Draft
                        @endif
                    </p>
                </div>
            </div>
            <div class="card-footer bg-light d-flex justify-content-end">
                <button type="submit" name="action" value="publish" class="btn btn-primary w-0.5">{{ $post->status_post === 'publish' ? 'Update' : 'Publish' }}</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                @foreach ($categories as $category)    
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label" for="category_{{ $category->id }}">
                      {{ $category->nama_kategori }}
                    </label>
                </div>
                @endforeach

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Tags
            </div>
            <div class="card-body">
                @foreach ($tags as $tag)    
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag_{{ $tag->id }}">
                      {{ $tag->nama_tag }}
                    </label>
                </div>
                @endforeach

            </div>
        </div>

        <div class="dropdown-post mb-3">
            <div class="dropdown-button-post" onclick="toggleDropdown(this)">
                <p>Thumbnail Image</p>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="dropdown-content-post" id="thumbnail-container">

                @if ($post->thumbnail_post)
                <!-- Tampilkan gambar yang ada dengan tombol hapus -->
                <div class="existing-thumbnail">
                    <div class="thumbnail-wrapper">
                        <img src="{{ asset('storage/thumbnails/' . $post->thumbnail_post) }}" 
                        alt="Thumbnail" 
                        class="thumbnail-preview">
                        <button type="button" 
                            class="btn btn-sm btn-danger delete-thumbnail"
                            onclick="confirmDeleteThumbnail()">
                        <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    <input type="hidden" name="remove_thumbnail" id="remove-thumbnail" value="0">
                </div>
                @else
                <label for="file-input" class="custom-file-upload">
                    Pilih File
                </label>
                <input type="file" name="thumbnail_post" id="file-input" class="file-input"/>
                <span id="file-name">Tidak ada file yang dipilih</span> <!-- Pesan default -->
                @endif
            </div>
        </div>

      </div>
    </form>
    <!-- End Browser Default Validation -->
    

    <script>
        function aturFileInput() {
            const fileInput = document.getElementById("file-input");
            const fileNameSpan = document.getElementById("file-name");

            if (fileInput && fileNameSpan) {
                fileInput.addEventListener("change", function () {
                    if (this.files && this.files.length > 0) {
                        fileNameSpan.textContent = this.files[0].name;
                    } else {
                        fileNameSpan.textContent = "Tidak ada file yang dipilih";
                    }
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi pertama kali
        aturFileInput();
        });

        // Fungsi konfirmasi hapus thumbnail
        function confirmDeleteThumbnail() {
        document.getElementById('remove-thumbnail').value = '1';
            document.querySelector('.existing-thumbnail').style.display = 'none';
            
            // Tampilkan kembali input file
            const dropdownContent = `
                <label for="file-input" class="custom-file-upload">
                    Pilih File
                </label>
                <input type="file" name="thumbnail_post" id="file-input" class="file-input"/>
                <span id="file-name">Tidak ada file yang dipilih</span>
            `;
            // Ganti kontainer dengan HTML baru
            document.getElementById('thumbnail-container').innerHTML = dropdownContent;
            aturFileInput();
        }
    </script>
    

@endsection