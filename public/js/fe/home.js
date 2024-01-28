document.addEventListener('DOMContentLoaded', function() {
    var scrollButton = document.getElementById('scroll-button');
    var informationSection = document.getElementById('main-search');

    // Function to scroll smoothly to a specific element
    function scrollToElement(element) {
        window.scrollTo({
            behavior: 'smooth',
            top: element.offsetTop
        });
    }

    // Add click event listener to the scroll button
    scrollButton.addEventListener('click', function() {
        scrollToElement(informationSection);
    });
});