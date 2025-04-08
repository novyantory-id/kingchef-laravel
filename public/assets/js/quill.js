// document.addEventListener("DOMContentLoaded", function () {
//     const container = document.getElementById("quill-editor");

//     if (container) {
//         const quill = new Quill("#quill-editor", {
//             theme: "snow",
//             modules: {
//                 toolbar: [
//                     ["bold", "italic", "underline", "strike"],
//                     ["blockquote", "code-block"],
//                     [{ header: 1 }, { header: 2 }],
//                     [{ list: "ordered" }, { list: "bullet" }],
//                     [{ script: "sub" }, { script: "super" }],
//                     [{ indent: "-1" }, { indent: "+1" }],
//                     [{ direction: "rtl" }],
//                     [{ size: ["small", false, "large", "huge"] }],
//                     [{ header: [1, 2, 3, 4, 5, 6, false] }],
//                     [{ color: [] }, { background: [] }],
//                     [{ font: [] }],
//                     [{ align: [] }],
//                     ["link", "image"],
//                     ["clean"],
//                 ],
//             },
//         });

//         // Update hidden input with Quill content
//         quill.on("text-change", function () {
//             document.getElementById("content_post").value =
//                 quill.root.innerHTML;
//         });

//         // Handler untuk upload gambar
//         quill.getModule("toolbar").addHandler("image", function () {
//             var input = document.createElement("input");
//             input.setAttribute("type", "file");
//             input.setAttribute("accept", "image/*");
//             input.click();

//             input.onchange = function () {
//                 var file = input.files[0];
//                 if (/^image\//.test(file.type)) {
//                     uploadImage(file);
//                 } else {
//                     console.warn("You can only upload images.");
//                 }
//             };
//         });

//         // Fungsi untuk upload gambar ke server
//         function uploadImage(file) {
//             var formData = new FormData();
//             formData.append("image", file);

//             fetch("/upload-image", {
//                 method: "POST",
//                 body: formData,
//                 headers: {
//                     "X-CSRF-TOKEN": document
//                         .querySelector('meta[name="csrf-token"]')
//                         .getAttribute("content"),
//                 },
//             })
//                 .then((response) => {
//                     if (response.status === 401) {
//                         window.location.href = "/";
//                         return;
//                     }
//                     return response.json();
//                 })
//                 .then((data) => {
//                     if (data && data.url) {
//                         // Sisipkan gambar ke Quill Editor
//                         var range = quill.getSelection();
//                         quill.insertEmbed(range.index, "image", data.url);
//                     }
//                 })
//                 .catch((error) =>
//                     console.error("Error uploading image:", error)
//                 );
//         }
//     } else {
//         console.error("Container Quill tidak ditemukan");
//     }
// });

// sudah dimodifikasi dengan fungsi hapus
document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("quill-editor");

    if (container) {
        // Array untuk menyimpan URL gambar yang diupload
        let uploadedImages = [];

        const quill = new Quill("#quill-editor", {
            theme: "snow",
            modules: {
                toolbar: [
                    ["bold", "italic", "underline", "strike"],
                    ["blockquote", "code-block"],
                    [{ header: 1 }, { header: 2 }],
                    [{ list: "ordered" }, { list: "bullet" }],
                    [{ script: "sub" }, { script: "super" }],
                    [{ indent: "-1" }, { indent: "+1" }],
                    [{ direction: "rtl" }],
                    [{ size: ["small", false, "large", "huge"] }],
                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                    [{ color: [] }, { background: [] }],
                    [{ font: [] }],
                    [{ align: [] }],
                    ["link", "image"],
                    ["clean"],
                ],
            },
        });

        // Update hidden input dengan konten Quill
        quill.on("text-change", function () {
            const content = quill.root.innerHTML;
            document.getElementById("content_post").value = content;

            // Periksa gambar yang dihapus
            checkDeletedImages(content);
        });

        // Fungsi untuk memeriksa gambar yang dihapus
        function checkDeletedImages(currentContent) {
            // Ekstrak semua gambar dari konten saat ini
            const tempDiv = document.createElement("div");
            tempDiv.innerHTML = currentContent;
            const currentImages = Array.from(
                tempDiv.querySelectorAll("img")
            ).map((img) => img.src);

            // Cari gambar yang ada di uploadedImages tapi tidak ada di currentImages
            const deletedImages = uploadedImages.filter(
                (url) => !currentImages.includes(url)
            );

            // Hapus file dari server
            if (deletedImages.length > 0) {
                deleteImagesFromServer(deletedImages);

                // Hapus dari array uploadedImages
                uploadedImages = uploadedImages.filter(
                    (url) => !deletedImages.includes(url)
                );
            }
        }

        // Fungsi untuk menghapus gambar dari server
        function deleteImagesFromServer(imageUrls) {
            fetch("/delete-image", {
                method: "POST",
                body: JSON.stringify({ images: imageUrls }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Images deleted successfully");
                    }
                })
                .catch((error) =>
                    console.error("Error deleting images:", error)
                );
        }

        // Handler untuk upload gambar
        quill.getModule("toolbar").addHandler("image", function () {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.click();

            input.onchange = function () {
                var file = input.files[0];
                if (/^image\//.test(file.type)) {
                    uploadImage(file);
                } else {
                    console.warn("You can only upload images.");
                }
            };
        });

        // Fungsi untuk upload gambar ke server
        function uploadImage(file) {
            var formData = new FormData();
            formData.append("image", file);

            fetch("/upload-image", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then((response) => {
                    if (response.status === 401) {
                        window.location.href = "/";
                        return;
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data && data.url) {
                        // Tambahkan URL ke array uploadedImages
                        uploadedImages.push(data.url);

                        // Sisipkan gambar ke Quill Editor
                        var range = quill.getSelection();
                        quill.insertEmbed(range.index, "image", data.url);
                    }
                })
                .catch((error) =>
                    console.error("Error uploading image:", error)
                );
        }
    } else {
        console.error("Container Quill tidak ditemukan");
    }
});

