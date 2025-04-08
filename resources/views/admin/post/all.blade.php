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
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Post Lists</h5>
          <form action="/admin/posts/add" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Add Post</button>
          </form>
          {{-- <a href="{{ route('admin.posts.add') }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Add Post</a> --}}
      </div>
      <!-- Small tables -->
      <div class="table-responsive">
        <table class="table table-sm custom-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Artikel</th>
                    <th>Penulis</th>
                    <th>Slug</th>
                    <th>Isi Konten</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($formattedPosts as $post)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $post['title_post'] }}</td>
                <td class="name-container">
                    {{ $post['username'] }}
                    <a href="{{ route('admin.posts.edit',$post['slug_post']) }}" class="detail-link">Edit</a>
                    {{-- <a href="{{ route('admin.posts.delete',$post['slug_post']) }}" class="text-danger tombol-hapus detail-link">Delete</a> --}}
                </td>
                <td>{{ $post['slug_post'] }}</td>
                <td>{{ e(substr(strip_tags($post['content_post']), 0, 75)) . strlen($post['content_post']) > 100 ? e(substr(strip_tags($post['content_post']), 0, 75)) . '...' : '' }}</td>
                <td>{{ $post['nama_kategori'] }}</td>
                <td>{{ $post['status_post'] }}</td>
                <td>{{ $post['updated_at']->format('d M Y H:i') }}</td>
            </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      <!-- End small tables -->

    </div>
  </div>

  <script src="{{ asset('assets/js/master.js') }}"></script>

  <script>
    function confirmDelete(button) {
    Swal.fire({
        title: "Yakin hapus?",
        text: "Data yang sudah dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus sekarang!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form terdekat yang terkait dengan tombol
            button.closest('form').submit();
        }
    });
}
</script>
    
@endsection