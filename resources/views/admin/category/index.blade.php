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
    <h5 class="card-title">Add Category</h5>

    <!-- Browser Default Validation -->
    <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
      @csrf
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input type="text" name="nama_kategori" class="form-control" id="inputForSlug" placeholder="ex: makanan, minuman, resep, etc" value="{{ old('nama_kategori') }}" oninput="slugUpdate()" required>
        @error('nama_kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Slug Category</label>
        <input type="text" name="slug_kategori" class="form-control" id="slugForInput" value="{{ old('slug_kategori') }}" required>
        @error('slug_kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-4">
        <label class="form-label">
          Category Img
        </label>
        <label for="file-input" class="category-file-upload">
          Pilih File
        </label>
        <input type="file" name="gambar_kategori" id="file-input" class="file-input"/>
        <span id="category-file-name">Tidak ada file yang dipilih</span>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Add Data</button>
      </div>
    </form>
    <!-- End Browser Default Validation -->

  </div>
</div>

<div class="card custom-card-fs">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Category List</h5>
      </div>
      <!-- Small tables -->
      <table class="table table-sm custom-table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Category</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->nama_kategori }}</td>
            <td>{{ $category->slug_kategori }}</td>
            <td>
              <a href="{{ route('admin.category.edit',$category->id) }}" title="edit" class="text-warning me-2"><i class="bi bi-pencil-square"></i></a>
              <a href="{{ route('admin.category.delete',$category->id) }}" title="delete" class="text-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End small tables -->

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