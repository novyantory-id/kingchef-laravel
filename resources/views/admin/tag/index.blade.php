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
    <h5 class="card-title">Add Tag</h5>

    <!-- Browser Default Validation -->
    <form action="" method="POST" class="row g-3">
      @csrf
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Tag Name</label>
        <input type="text" name="nama_tag" class="form-control" id="inputForSlug" placeholder="ex: makanan, minuman, resep, etc" value="{{ old('nama_tag') }}" oninput="slugUpdate()" required>
        @error('nama_tag')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Slug Tag</label>
        <input type="text" name="slug_tag" class="form-control" id="slugForInput" value="{{ old('slug_tag') }}" required>
        @error('slug_tag')
            <div class="text-danger">{{ $message }}</div>
        @enderror
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
          <h5 class="card-title">Tags List</h5>
      </div>
      <!-- Small tables -->
      <table class="table table-sm custom-table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tag</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $tag->nama_tag }}</td>
            <td>{{ $tag->slug_tag }}</td>
            <td>
              <a href="{{ route('admin.tag.edit',$tag->id) }}" title="edit" class="text-warning me-2"><i class="bi bi-pencil-square"></i></a>
              <a href="{{ route('admin.tag.delete',$tag->id) }}" title="delete" class="text-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End small tables -->

    </div>
  </div>

  <script src="{{ asset('assets/js/master.js') }}"></script>
    
@endsection