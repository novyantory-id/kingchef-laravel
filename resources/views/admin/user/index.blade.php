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
          <h5 class="card-title">User Lists</h5>
          <a href="{{ route('admin.users.add') }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Add User</a>
      </div>
      <!-- Small tables -->
      <div class="table-responsive">
        <table class="table table-sm custom-table align-middle">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Avatar</th>
                <th scope="col">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">No.HP</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('assets/img/'.$user->avatar) }}" alt="" class="img-fluid responsive-img">
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nohp }}</td>
                <td>
                  @if ($user->status_user === 'aktif')
                    <p class="text-success m-0">Aktif</p>
                    @else
                    <p class="text-danger m-0">Nonaktif</p>
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.users.edit',$user->id) }}" title="edit" class="text-warning me-1"><i class="bi bi-pencil-square"></i></a>
                  {{-- <a href="{{ route('admin.users.delete',$user->id) }}" title="delete" class="text-danger"><i class="bi bi-trash-fill"></i></a> --}}
                  <form action="{{ route('admin.users.delete',$user->id) }}" method="post" id="deleteForm" class="d-inline">
                    @csrf
                      @method('DELETE')
                      <button type="button" onclick="confirmDelete(this)" class="btn no-bg p-0 text-danger border-0 bg-color-0"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
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