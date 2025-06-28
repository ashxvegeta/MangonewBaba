document.addEventListener('DOMContentLoaded', function () {
    const categoryNavigation = document.getElementById('category-navigation');
    if (categoryNavigation) {
        const categoryLinks = categoryNavigation.querySelectorAll('li a');

        categoryLinks.forEach(link => {
            link.addEventListener('click', function (event) {
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
    }

    const showMoreButton = document.getElementById('showMoreCategories');
    const additionalCategories = document.querySelectorAll('.additional-category');

    if (showMoreButton && additionalCategories.length > 0) {
        showMoreButton.addEventListener('click', function () {
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
    }

    const hideFilterBtn = document.getElementById('hideFilterBtn');
    const filterSidebar = document.querySelector('.filter-sidebar');
    const productSection = document.querySelector('section.col-md-7');
    const productContainer = document.querySelector('.product-container');

    if (hideFilterBtn && filterSidebar && productSection && productContainer) {
        hideFilterBtn.addEventListener('click', function () {
            if (filterSidebar.style.display === 'none') {
                // Show filter sidebar
                filterSidebar.style.display = 'block';
                hideFilterBtn.innerHTML = '<i class="fa-solid fa-filter-circle-xmark me-2"></i> Hide Filter';
                productSection.classList.replace('col-md-12', 'col-md-7'); // Adjust section width
                productContainer.style.gridTemplateColumns = 'repeat(3, 1fr)'; // 3 cards per row
            } else {
                // Hide filter sidebar
                filterSidebar.style.display = 'none';
                hideFilterBtn.innerHTML = '<i class="fa-solid fa-filter-circle-xmark me-2"></i> Show Filter';
                productSection.classList.replace('col-md-7', 'col-md-12'); // Adjust section width
                productContainer.style.gridTemplateColumns = 'repeat(4, 1fr)'; // 4 cards per row
            }
        });

        // Initial setup to show 3 cards per row when filter is visible
        if (filterSidebar.style.display !== 'none') {
            productContainer.style.gridTemplateColumns = 'repeat(3, 1fr)'; // 3 cards per row
        } else {
            productContainer.style.gridTemplateColumns = 'repeat(4, 1fr)'; // 4 cards per row
        }
    }
});
