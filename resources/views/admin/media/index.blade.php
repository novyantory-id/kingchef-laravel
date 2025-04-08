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

<div class="container">
    <h2>Media Library</h2>
    
    <div class="row">
        @foreach($images as $image)
        <div class="col-md-3 mb-4 media-item"> <!-- Tambahkan class media-item -->
            <div class="card">
                <img src="{{ $image['url'] }}" class="card-img-top" alt="{{ $image['name'] }}">
                <div class="card-body">
                    <h6 class="card-title">{{ $image['name'] }}</h6>
                    <p class="card-text small text-muted">
                        {{ formatBytes($image['size']) }} • 
                        {{ date('Y-m-d H:i', $image['last_modified']) }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ $image['url'] }}" target="_blank" class="btn btn-sm btn-outline-primary w-50">View</a>
                        <button class="btn btn-sm btn-outline-danger btn-delete-media w-50" 
                                data-path="{{ basename($image['url']) }}">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // script yang benar
//     document.querySelectorAll('.btn-delete-media').forEach(btn => {
//     btn.addEventListener('click', async function() {
//         const filename = this.dataset.path; // Format: "1_003.jpg"
        
//         try {
//             const response = await fetch("{{ route('delete.media') }}", {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//                 },
//                 body: JSON.stringify({ 
//                     path: `content/${filename}` 
//                 })
//             });

//             const data = await response.json();
//             console.log("Response:", data);
            
//             if (!response.ok) {
//                 throw new Error(data.error || 'Gagal menghapus');
//             }

//             this.closest('.media-item').remove();
//             alert('Gambar berhasil dihapus');
            
//         } catch (error) {
//             console.error("Error:", {
//                 message: error.message,
//                 requestPath: `content/${filename}`,
//                 stack: error.stack
//             });
//             alert("Error: " + error.message);
//         }
//     });
// });

// document.querySelectorAll('.btn-delete-media').forEach(btn => {
//     btn.addEventListener('click', function() {
//         const filename = this.dataset.path;
        
//         if (confirm(`Yakin ingin menghapus ${filename}?`)) {
//             // Proses penghapusan...
//             fetch("{{ route('delete.media') }}", {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//                 },
//                 body: JSON.stringify({ 
//                     path: `content/${filename}` 
//                 })
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     this.closest('.media-item').remove();
                    
//                 } else {
//                     throw new Error(data.error || 'Gagal menghapus');
//                 }
//             })
//             .catch(error => {
//                 console.error("Error:", error);
//                 alert("Error: " + error.message);
//             });
//         }
//     });
// });

document.querySelectorAll('.btn-delete-media').forEach(btn => {
    btn.addEventListener('click', function() {
        const filename = this.dataset.path;
        
        if (confirm(`Yakin ingin menghapus ${filename}?`)) {
            fetch("{{ route('delete.media') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ 
                    path: `content/${filename}` // Format: "content/filename.jpg"
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw new Error(err.error); });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    this.closest('.media-item').remove();
                    // alert
                    const alertHTML = `
                        <div id="alert-success" class="alert-custom alert-successs">
                        <i class="bi bi-check-circle"></i> Gambar berhasil dihapus!
                        <div class="progress-bar"></div>
                        </div>
                    `;
                    document.body.insertAdjacentHTML('afterbegin', alertHTML);
                    showAlert('success');
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Error: " + error.message);
            });
        }
    });
});
</script>
@endsection


