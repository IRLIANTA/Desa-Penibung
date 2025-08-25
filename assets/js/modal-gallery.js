document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.getElementById("Selected-Image");
    const description = document.getElementById("description");

    const galleryButtons = document.querySelectorAll("[data-gallery]"); 
    const modalGalleryButtons = document.querySelectorAll("[data-image]"); 

    galleryButtons.forEach(button => {
        button.addEventListener("click", function () {
            const imageSrc = this.getAttribute("data-gallery");
            const imageDesc = this.getAttribute("data-description");

            mainImage.src = imageSrc;
            description.textContent = imageDesc || "Tidak ada deskripsi";

            modalGalleryButtons.forEach(btn => btn.classList.remove("active"));

            const matchingButton = Array.from(modalGalleryButtons).find(btn => btn.getAttribute("data-image") === imageSrc);
            if (matchingButton) {
                matchingButton.classList.add("active");
                description.textContent = matchingButton.getAttribute("data-description") || imageDesc || "Tidak ada deskripsi";
            }
        });
    });

    modalGalleryButtons.forEach(button => {
        button.addEventListener("click", function () {
            const imageSrc = this.getAttribute("data-image");
            const imageDesc = this.getAttribute("data-description");

            mainImage.src = imageSrc;
            description.textContent = imageDesc || "Tidak ada deskripsi";

            modalGalleryButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
