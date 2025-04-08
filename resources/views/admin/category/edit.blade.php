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
    <form action="" method="POST" class="row g-3">
      @csrf

      <input type="hidden" name="id" value="{{ $categories->id }}">
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input type="text" name="nama_kategori" class="form-control" id="inputForSlug" placeholder="ex: makanan, minuman, resep, etc" value="{{ $categories->nama_kategori }}" oninput="slugUpdate()" required>
        @error('nama_kategori')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-4">
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
    
@endsection