@extends('writer.layout')

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
          <form action="/writer/posts/add" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Add Post</button>
          </form>
          {{-- <a href="{{ route('admin.posts.add') }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Add Post</a> --}}
      </div>
      <!-- Small tables -->
      <div class="table-responsive">
        <table id="postsTable" class="table table-sm custom-table custom-table nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Slug</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Last Modified</th>

                </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="title-cell">
                    @if(auth()->user()->role === 'admin' || (auth()->user()->role === 'writer' && auth()->user()->id === $post->user_id))
                      <a href="{{ route('writer.posts.edit', $post->slug_post) }}" class="editable-title">
                        {{ $post->title_post }}
                      </a>
                    @else
                      <span class="static-title">
                        {{ $post->title_post }}
                      </span>
                    @endif
                  </td>
                <td class="name-container">
                    {{ $post->user->username }}
                </td>
                <td>{{ $post->slug_post }}</td>
                <td>{{ e(substr(strip_tags($post->content_post), 0, 75)) . strlen($post->content_post) > 100 ? e(substr(strip_tags($post->content_post), 0, 75)) . '...' : '' }}</td>
                <td>{{ $post->categories->pluck('nama_kategori')->implode(', ') ?: '-' }}</td>
                <td>{{ $post->tags->pluck('nama_tag')->implode(', ') ?: '-' }}</td>
                <td>
                  {{ $post->status_post }}
                  <p>{{ $post->published_at?->format('d M Y H:i') ?? '-' }}</p>
                </td>
                <td>{{ $post->updated_at->format('d M Y H:i') }}</td>
            </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      <!-- End small tables -->

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

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

<script>
    $(document).ready(function() {
    $('#postsTable').DataTable({
        responsive: {
            details: {
            type: 'column',
            target: 0
            }
        },
        columnDefs: [
            {
            className: 'control',
            orderable: false,
            targets: 0
            },
            {
            // Kolom yang selalu ditampilkan
            responsivePriority: 1,
            targets: [0, 1, 2, 7, 8] // No, Title, Author, Status, Modified
            },
            {
            // Kolom yang bisa disembunyikan
            responsivePriority: 2,
            targets: [3, 4, 5, 6] // Slug, Content, Category, Tag
            }
        ]
        });
    });

</script>
    
@endsection