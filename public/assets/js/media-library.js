document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk mengunggah gambar
    function uploadImage() {
        const fileInput = document.getElementById("upload-image");
        const file = fileInput.files[0];
        const formData = new FormData();
        formData.append("image", file);

        fetch("/media/upload", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                console.log("File uploaded:", data);
                loadMedia(); // Memperbarui daftar media library
            })
            .catch((error) => {
                console.error("Error uploading file:", error);
            });
    }

    // Fungsi untuk memuat daftar media
    function loadMedia() {
        fetch("/media")
            .then((response) => response.json())
            .then((data) => {
                const mediaList = document.getElementById("media-list");
                mediaList.innerHTML = "";

                data.forEach((media) => {
                    const mediaItem = document.createElement("div");
                    mediaItem.innerHTML = `
                    <img src="${media.url}" alt="${media.name}" style="width: 100px; height: 100px; cursor: pointer;">
                    <button onclick="deleteMedia(${media.id})">Delete</button>
                `;
                    mediaList.appendChild(mediaItem);
                });
            });
    }

    // Fungsi untuk menghapus media
    function deleteMedia(id) {
        fetch(`/media/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data.message);
                loadMedia(); // Memperbarui daftar media library
            })
            .catch((error) => {
                console.error("Error deleting file:", error);
            });
    }

    // Muat daftar media saat halaman dimuat
    loadMedia();
});
