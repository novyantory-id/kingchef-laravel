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
    <h5 class="card-title">Edit User</h5>

    <!-- Browser Default Validation -->
    <form action="" method="POST" class="row g-3">
      @csrf
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Username</label>
        <input type="text" name="username" class="form-control"  placeholder="ex: kadalmabur" value="{{ $users->username }}" >
        @error('username')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Fullname</label>
        <input type="text" name="fullname" class="form-control" value="{{ $users->fullname }}" placeholder="Your Fullname.." >
        @error('fullname')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $users->email }}" placeholder="example@gmail.com" >
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">No.HP</label>
        <input type="number" name="nohp" class="form-control" value="{{ $users->nohp }}" placeholder="082345678901..." >
        @error('nohp')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="validationDefault04" class="form-label">State</label>
        <select class="form-select" name="status_user" id="validationDefault04" required>
            @if ($users->status_user === 'aktif')
                <option value="{{ $users->status_user }}">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            @endif
            @if ($users->status_user === 'nonaktif')
                <option value="{{ $users->status_user }}">Nonaktif</option>
                <option value="aktif">Aktif</option>
            @endif
        </select>
        @error('status_user')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update User</button>
      </div>
    </form>
    <!-- End Browser Default Validation -->

  </div>
</div>

@endsection