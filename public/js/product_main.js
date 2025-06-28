document.addEventListener('DOMContentLoaded', function() {
    let xzoomInitialized = false;

    $('.product-main-image, .product-more-image').click(function(event) {
        if (xzoomInitialized) {
            $('#image_modal').modal('show');
        }
    });

    $('.product-main-image').hover(function() {
        if (!xzoomInitialized) {
            const isMobile = () => /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            if (!isMobile()) {
                $('.product-main-image').xzoom({
                    zoomWidth: 300, // Adjust the zoom preview box width
                    zoomHeight: 200, // Adjust the zoom preview box height
                    title: false,
                    Xoffset: 10, // Adjust horizontal position to stay inside the container
                });
            }
            xzoomInitialized = true;
        }
    });

    $('.product-more-image').hover(function() {
        let type = $(this).attr('data-type');
        let newSrc = $(this).attr('src');
        $('.product-main-image')
            .attr('src', newSrc)
            .attr('xoriginal', newSrc)
            .attr('data-type', type)
            .css({
                width: '500px', // Maintain the width
                height: '300px', // Maintain the height
                objectFit: 'cover', // Corrected syntax
            });
    });

    $(document).on('mouseenter', '.product-more-modal-image', function() {
        let src = $(this).attr('data-src');
        $('.product-main-modal-image').attr('src', src);
    });

    $('#image_modal').on('show.bs.modal', function() {
        const src = $('.product-main-image').attr('src');

        $('#image_modal_body').html(`
    <div class="product-main-image-div">
        <img src="${src}" alt="Product Image" class="img-fluid product-main-modal-image">
    </div>
`);

        // Add remaining thumbnails
        $('.product-more-image').each(function() {
            $('#image_modal_body').append(`
        <div class="product-more-image-div m-2">
            <img src="${$(this).attr('src')}" 
                 data-type="${$(this).attr('data-type')}" 
                 data-src="${$(this).attr('data-src')}" 
                 class="img-fluid product-more-modal-image">
        </div>
    `);
        });

        // Add hover event listener for modal thumbnails
        $(document).on('mouseenter', '.product-more-modal-image', function() {
            let src = $(this).attr('data-src');
            $('.product-main-modal-image').attr('src', src);
        });

        // Zoom functionality
        const container = document.querySelector(".product-main-image-div");
        const img = container.querySelector(".product-main-modal-image");
        let isImageScaled = false;
        let isDoubleClick = false;

        container.addEventListener("click", (e) => {
            if (!isImageScaled) {
                img.style.transform = "scale(1.5)";
                img.style.cursor = "zoom-out";
                isImageScaled = true;
            } else {
                img.style.transform = "scale(1)";
                img.style.cursor = "zoom-in";
                isImageScaled = false;
            }
        });

        container.addEventListener("mousemove", (e) => {
            if (isImageScaled) {
                const rect = container.getBoundingClientRect();
                const offsetX = (e.clientX - rect.left) / rect.width;
                const offsetY = (e.clientY - rect.top) / rect.height;
                img.style.transformOrigin = `${offsetX * 100}% ${offsetY * 100}%`;
            }
        });

        // Mobile handling
        const isMobile = () => /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        if (isMobile()) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('double-click-to-zoom-message');
            messageDiv.textContent = 'Double Click To Zoom';
            container.appendChild(messageDiv);
            setTimeout(() => container.removeChild(messageDiv), 2500);
        }

        container.addEventListener("touchstart", (e) => {
            e.preventDefault();
            if (!isDoubleClick) {
                isDoubleClick = true;
                setTimeout(() => isDoubleClick = false, 500);
            } else {
                isImageScaled = !isImageScaled;
                img.style.transform = isImageScaled ? "scale(1.5)" : "scale(1)";
            }
        });

        container.addEventListener("touchmove", (e) => {
            e.preventDefault();
            if (isImageScaled) {
                const touch = e.touches[0];
                const rect = container.getBoundingClientRect();
                const offsetX = (touch.clientX - rect.left) / rect.width;
                const offsetY = (touch.clientY - rect.top) / rect.height;
                img.style.transformOrigin = `${offsetX * 100}% ${offsetY * 100}%`;
            }
        });
    });
});