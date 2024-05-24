// script.js
document.addEventListener("DOMContentLoaded", function() {
    const dragAreaCategory = document.getElementById("drag-area-category");
    const fileInputCategory = document.getElementById("file-input-category");
    const dragTextCategory = document.getElementById("drag-text-category");
    const thumbContainerCategory = document.getElementById("thumb-container-category");

    const dragAreaBanner = document.getElementById("drag-area-banner");
    const fileInputBanner = document.getElementById("file-input-banner");
    const dragTextBanner = document.getElementById("drag-text-banner");
    const thumbContainerBanner = document.getElementById("thumb-container-banner");

    // Category Image Events
    dragAreaCategory.addEventListener("click", () => fileInputCategory.click());

    dragAreaCategory.addEventListener("dragover", (event) => {
        event.preventDefault();
        dragAreaCategory.classList.add("dragging");
    });

    dragAreaCategory.addEventListener("dragleave", () => {
        dragAreaCategory.classList.remove("dragging");
    });

    dragAreaCategory.addEventListener("drop", (event) => {
        event.preventDefault();
        dragAreaCategory.classList.remove("dragging");
        handleFiles(event.dataTransfer.files, 'category');
    });

    fileInputCategory.addEventListener("change", (event) => {
        handleFiles(event.target.files, 'category');
    });

    // Banner Image Events
    dragAreaBanner.addEventListener("click", () => fileInputBanner.click());

    dragAreaBanner.addEventListener("dragover", (event) => {
        event.preventDefault();
        dragAreaBanner.classList.add("dragging");
    });

    dragAreaBanner.addEventListener("dragleave", () => {
        dragAreaBanner.classList.remove("dragging");
    });

    dragAreaBanner.addEventListener("drop", (event) => {
        event.preventDefault();
        dragAreaBanner.classList.remove("dragging");
        handleFiles(event.dataTransfer.files, 'banner');
    });

    fileInputBanner.addEventListener("change", (event) => {
        handleFiles(event.target.files, 'banner');
    });

    function handleFiles(files, type) {
        if (files.length > 0) {
            validateAndPreviewFile(files[0], type);
        }
    }

    function validateAndPreviewFile(file, type) {
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        const maxSize = 2 * 1024 * 1024; // 2 MB

        if (!validTypes.includes(file.type)) {
            alert('Only JPG, JPEG, and PNG files are allowed.');
            return;
        }

        if (file.size > maxSize) {
            alert('File size exceeds 2 MB.');
            return;
        }

        const reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onloadend = () => {
            const img = new Image();
            img.src = reader.result;

            img.onload = () => {
                const { width, height } = img;
                let validRatio = false;
                if (type === 'category' && width === height) {
                    validRatio = true;
                } else if (type === 'banner' && (width / height) === 8) {
                    validRatio = true;
                }

                if (!validRatio) {
                    alert(`Image ratio must be ${type === 'category' ? '1:1' : '8:1'}.`);
                    return;
                }

                // Clear previous images and text
                if (type === 'category') {
                    thumbContainerCategory.innerHTML = '';
                    dragTextCategory.classList.add('hidden');
                    img.classList.add("thumb");
                    thumbContainerCategory.appendChild(img);
                } else if (type === 'banner') {
                    thumbContainerBanner.innerHTML = '';
                    dragTextBanner.classList.add('hidden');
                    img.classList.add("thumb");
                    thumbContainerBanner.appendChild(img);
                }
            };
        };
    }
});
