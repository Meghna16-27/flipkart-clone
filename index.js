//header scroll
    window.addEventListener('scroll', function() {
        const categoryBar = document.querySelector('.outline');
        if (window.scrollY > 40) {
            categoryBar.classList.add('hide-icons');
        } else {
            categoryBar.classList.remove('hide-icons');
        }
    });

 //dropdown 
const dropdown = document.querySelector('.user-dropdown');
const content = document.querySelector('.dropdown-content');

// Open menu when mouse enters the user element
dropdown.addEventListener('mouseenter', () => {
    content.classList.add('show');
});

// Close menu when clicking anywhere outside
document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target)) {
        content.classList.remove('show');
    }
});