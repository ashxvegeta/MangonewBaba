document.addEventListener('DOMContentLoaded', function() {


            const sliderTrack = document.getElementById('sliderTrack');
        const leftBtn = document.getElementById('slider-left');
        const rightBtn = document.getElementById('slider-right');
        const cards = sliderTrack.querySelectorAll('li');
        const cardWidth = cards[0].offsetWidth + 16; // card width + padding/margin
        const totalCards = cards.length;
        const visibleCards = Math.floor(document.getElementById('product-slider').offsetWidth / cardWidth);
        let currentIndex = 0;

        // 🔁 Clone first few cards for infinite scroll illusion
        for (let i = 0; i < visibleCards; i++) {
            const clone = cards[i].cloneNode(true);
            sliderTrack.appendChild(clone);
        }

        function updateSlider() {
            const shift = currentIndex * -cardWidth;
            sliderTrack.style.transform = `translateX(${shift}px)`;
            sliderTrack.style.transition = 'transform 0.3s ease-in-out';
        }

        rightBtn.addEventListener('click', () => {
            currentIndex++;
            updateSlider();

            // After sliding to the cloned end, reset position
            if (currentIndex >= totalCards) {
                setTimeout(() => {
                    sliderTrack.style.transition = 'none';
                    currentIndex = 0;
                    sliderTrack.style.transform = `translateX(0px)`;
                }, 300); // match the transition duration
            }
        });

        leftBtn.addEventListener('click', () => {
            if (currentIndex <= 0) {
                currentIndex = totalCards;
                sliderTrack.style.transition = 'none';
                sliderTrack.style.transform = `translateX(${currentIndex * -cardWidth}px)`;
                setTimeout(() => {
                    sliderTrack.style.transition = 'transform 0.3s ease-in-out';
                    currentIndex--;
                    updateSlider();
                }, 10);
            } else {
                currentIndex--;
                updateSlider();
            }
        });
    const categoryNavigation = document.getElementById('category-navigation');
    const categoryLinks = categoryNavigation.querySelectorAll('li a');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Remove active class from all links
            categoryLinks.forEach(link => {
                link.style.color = ''; // Reset color
                link.parentElement.classList.remove('active');
            });

            // Highlight the clicked link
            this.style.color = 'rgb(118, 185, 0)';
            this.parentElement.classList.add('active');
        });
    });

    const showMoreButton = document.getElementById('showMoreCategories');
    const additionalCategories = document.querySelectorAll('.additional-category');

    showMoreButton.addEventListener('click', function() {
        const isHidden = additionalCategories[0].classList.contains('d-none');

        if (isHidden) {
            // Show additional categories
            additionalCategories.forEach(category => category.classList.remove('d-none'));
            showMoreButton.textContent = 'Show less -';
        } else {
            // Hide additional categories
            additionalCategories.forEach(category => category.classList.add('d-none'));
            showMoreButton.textContent = 'Show more +';
        }
    });

    const hideFilterBtn = document.getElementById('hideFilterBtn');
    const filterSidebar = document.querySelector('.filter-sidebar');
    // alert(filterSidebar);
    const productSection = document.querySelector('.col-lg-8');
    const productContainer = document.querySelector('.product-container');

    hideFilterBtn.addEventListener('click', function() {
        if (window.getComputedStyle(filterSidebar).display === 'none') {
            // Show filter sidebar
            filterSidebar.style.display = 'block';
            hideFilterBtn.innerHTML = '<i class="fa-solid fa-filter-circle-xmark me-2"></i> Hide Filter';
            productSection.classList.replace('col-lg-8', 'col-lg-12'); // Adjust section width
            productContainer.style.gridTemplateColumns = 'repeat(3, 1fr)'; // 3 cards per row
        } else {
            // Hide filter sidebar
            filterSidebar.style.display = 'none';
            hideFilterBtn.innerHTML = '<i class="fa-solid fa-filter-circle-xmark me-2"></i> Show Filter';
            productSection.classList.replace('col-lg-8', 'col-lg-12'); // Adjust section width
            productContainer.style.gridTemplateColumns = 'repeat(4, 1fr)'; // 4 cards per row
        }
    });

    // Initial setup to show 3 cards per row when filter is visible
    if (window.getComputedStyle(filterSidebar).display !== 'none') {
        productContainer.style.gridTemplateColumns = 'repeat(3, 1fr)'; // 3 cards per row
    } else {
        productContainer.style.gridTemplateColumns = 'repeat(4, 1fr)'; // 4 cards per row
    }
});