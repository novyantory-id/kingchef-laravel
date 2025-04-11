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
          <h5 class="card-title">Editor Pick Lists</h5>
          {{-- <a href="{{ route('admin.posts.add') }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Add Post</a> --}}
      </div>
      <!-- Small tables -->
      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Prioritas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title_post }}</td>
                    <td>{{ $post->user->username }}</td>
                    <td>
                        <span class="badge {{ $post->is_editor_pick ? 'bg-success' : 'bg-secondary' }}">
                            {{ $post->is_editor_pick ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        @if($post->is_editor_pick)
                        <form method="POST" action="{{ route('admin.editor-picks.update') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="is_editor_pick" value="1">
                            <input type="number" 
                                   name="priority"
                                   value="{{ $post->editor_pick_priority }}"
                                   min="1" 
                                   max="100"
                                   class="form-control d-inline-block" style="width: 80px;"
                                   onchange="this.form.submit()">
                        </form>       
                        @endif
                    </td>
                    <td>
                        @if($post->is_editor_pick)
                            <!-- Form untuk menonaktifkan -->
                            <form method="POST" action="{{ route('admin.editor-picks.update') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="is_editor_pick" value="0">
                                <input type="hidden" name="priority" value="0">
                                
                                <div class="form-check form-switch">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           checked
                                           onchange="this.form.submit()">
                                </div>
                            </form>
                        @else
                            <!-- Form untuk mengaktifkan -->
                            <form method="POST" action="{{ route('admin.editor-picks.update') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="is_editor_pick" value="1">
                                <input type="hidden" name="priority" value="50">
                                
                                <div class="form-check form-switch">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           onchange="this.form.submit()">
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
      </div>
      <!-- End small tables -->

    </div>
  </div>

  @endsection

@section('scripts')
  <script src="{{ asset('assets/js/master.js') }}"></script>
    
@endsection