@extends('admin.layout')

@section('content')

<div class="pagetitle custom-card-fs">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{ $breadcrumb1 }}</a></li>
      <li class="breadcrumb-item active">{{ $breadcrumb2 }}</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<div class="card custom-card-fs">
  <div class="card-body">
    <h5 class="card-title">Edit Category</h5>

    <!-- Browser Default Validation -->
    <form action="" enctype="multipart/form-data" method="POST" class="row g-3">
      @csrf

      <input type="hidden" name="id" value="{{ $categories->id }}">
      <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Image Category</label>
        <div class="col-md-8 col-lg-9" id="thumbnail-container">

                    
          @if ($categories->gambar_kategori)
              <div class="existing-thumbnail">
                  <div class="thumbnail-wrapper">
                      <img src="{{ asset('storage/categorytag/' . $categories->gambar_kategori) }}" 
                      alt="Thumbnail" 
                      class="img-preview">
                  </div>
                  <input type="hidden" name="gambar_lama" value="{{ $categories->gambar_kategori }}">

                  <div>
                    <label for="file-input" class="category-file-upload">
                      Ubah Gambar
                    </label>
                    <input type="file" name="gambar_kategori" id="file-input" class="file-input"/>
                    <span id="category-file-name">Tidak ada file yang dipilih</span> <!-- Pesan default -->
                  </div>
              </div>
              
          @else
              <label for="file-input" class="profile-file-upload">
                  Pilih File
              </label>
              <input type="hidden" name="gambar_lama" value="{{ $categories->gambar_kategori }}">
              <input type="file" name="gambar_kategori" id="file-input" class="file-input"/>
              <span id="category-file-name">Tidak ada file yang dipilih</span> <!-- Pesan default -->
          @endif

      </div>
      </div>
      <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input type="text" name="nama_kategori" class="form-control" id="inputForSlug" placeholder="ex: makanan, minuman, resep, etc" value="{{ $categories->nama_kategori }}" oninput="slugUpdate()" required>
        @error('nama_kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">
        <label for="validationDefault02" class="form-label">Slug Category</label>
        <input type="text" name="slug_kategori" class="form-control" id="slugForInput" value="{{ $categories->slug_kategori }}" required>
        @error('slug_kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update Data</button>
      </div>
    </form>
    <!-- End Browser Default Validation -->

  </div>
</div>

</div>

  <script src="{{ asset('assets/js/master.js') }}"></script>

  <script>
    const fileInput = document.getElementById("file-input");
            const fileNameSpan = document.getElementById("category-file-name");

            if (fileInput && fileNameSpan) {
                fileInput.addEventListener("change", function () {
                    if (this.files && this.files.length > 0) {
                        fileNameSpan.textContent = this.files[0].name;
                    } else {
                        fileNameSpan.textContent = "Tidak ada file yang dipilih";
                    }
                });
            }
  </script>
    
@endsection