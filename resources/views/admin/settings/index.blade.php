@extends('admin.layout')

@section('content')

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            @if ($user->avatar)
            <img src="{{ asset('storage/profile/' . $user->avatar) }}" 
            alt="Avatar" class="rounded-circle">
            @else
            <img src="{{ asset('assets/img/frontend/default.png') }}" alt="Profile" class="rounded-circle">
            <h2>{{ $user->fullname }}</h2>
            <h3>{{ $user->role }}</h3>
            @endif
            
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $user->fullname }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8">{{ $user->username }}</div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">PT Novyantory Media Indonesia</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">{{ $user->role }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ $user->nohp }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8">{{ $user->status_user }}</div>
                  </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('admin.settings.profile') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9" id="thumbnail-container">

                    
                        @if ($user->avatar)
                            <div class="existing-thumbnail">
                                <div class="thumbnail-wrapper">
                                    <img src="{{ asset('storage/profile/' . $user->avatar) }}" 
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
                            <label for="file-input" class="profile-file-upload">
                                Pilih File
                            </label>
                            <input type="file" name="avatar" id="file-input" class="file-input"/>
                            <span id="profile-file-name">Tidak ada file yang dipilih</span> <!-- Pesan default -->
                        @endif

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullname" type="text" class="form-control" id="fullname" value="{{ $user->fullname }}">
                      @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                  </div>

                  <div class="row mb-3">
                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="username" type="text" class="form-control" id="username" value="{{ old('username',$user->username) }}">
                      @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>  
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nohp" type="text" class="form-control" id="nohp" value="{{ $user->nohp }}">
                      @error('nohp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST" action="{{ route('admin.settings.password') }}">
                @csrf
                @method('PUT')
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="current_password" type="password" class="form-control" id="currentPassword">
                      @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="password">
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="re_enter_password" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="re_enter_password" type="password" class="form-control" id="re_enter_password">
                      @error('re_enter_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
    function aturFileInput() {
            const fileInput = document.getElementById("file-input");
            const fileNameSpan = document.getElementById("profile-file-name");

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
                <label for="file-input" class="profile-file-upload">
                    Pilih File
                </label>
                <input type="file" name="avatar" id="file-input" class="file-input"/>
                <span id="profile-file-name">Tidak ada file yang dipilih</span>
            `;
            // Ganti kontainer dengan HTML baru
            document.getElementById('thumbnail-container').innerHTML = dropdownContent;
            aturFileInput();
        }
  </script>

@endsection