// Cek apakah elemen textarea dengan ID 'content_post' ada
if (document.getElementById("content_post")) {
    // Inisialisasi CKEditor
    CKEDITOR.replace("content_post", {
        extraPlugins: "uploadimage", // Aktifkan plugin upload image
        uploadUrl: "/upload-image", // Endpoint untuk upload gambar
        filebrowserUploadUrl: "/upload-image", // Endpoint untuk upload gambar
        filebrowserUploadMethod: "form", // Metode upload menggunakan form
        height: 300, // Tinggi editor
    });
}
