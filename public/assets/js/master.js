// alert
function showAlert(type) {
    let alertBox = document.getElementById(
        type === "success" ? "alert-success" : "alert-failed"
    );
    if (!alertBox) return;

    let progressBar = alertBox.querySelector(".progress-bar");
    alertBox.style.display = "block";
    alertBox.style.opacity = "1";
    progressBar.style.width = "0%";

    setTimeout(() => {
        progressBar.style.width = "100%";
    }, 100);

    setTimeout(() => {
        let fadeOut = setInterval(() => {
            if (parseFloat(alertBox.style.opacity > 0)) {
                alertBox.style.opacity -= "0.1";
            } else {
                clearInterval(fadeOut);
                alertBox.style.display = "none";
            }
        }, 50);
    }, 5000);
}

// Tampilkan alert jika ada flashdata
if (document.getElementById("alert-success")) showAlert("success");
if (document.getElementById("alert-failed")) showAlert("failed");
// -----------------------------------------------------------

function slugUpdate() {
    let inputForSlug = document.getElementById("inputForSlug").value;

    let slugForInput = inputForSlug
        .toLowerCase()
        .replace(/\s+/g, "-") //ganti spasi dengan "-"
        .replace(/[^a-z0-9-]/g, "") //ganti karakter non-alphanumeric kecuali "-"
        .replace(/-+/g, "-")
        // Gabungkan "-" berulang menjadi satu
        .replace(/^-|-$/g, ""); // Hapus "-" di awal/akhir

    document.getElementById("slugForInput").value = slugForInput;
}

function toggleDropdown(button) {
    const dropdown = button.closest(".dropdown-post");
    const dropdownContent = dropdown.querySelector(".dropdown-content-post");

    dropdown.classList.toggle("active");

    if (dropdown.classList.contains("active")) {
        dropdownContent.style.maxHeight = dropdownContent.scrollHeight + "px";
    } else {
        dropdownContent.style.maxHeight = "0";
    }
}
