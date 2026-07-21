//han
const categoriesBar = document.querySelector('.outline');
    const contentScroll = document.querySelector('.content-scroll');

    contentScroll.addEventListener('scroll', () => {
        categoriesBar.classList.toggle('hide-icons', contentScroll.scrollTop > 10);
    });


