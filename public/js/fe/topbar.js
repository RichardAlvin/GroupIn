document.addEventListener('DOMContentLoaded', function () {
    var userMenu = document.getElementById('userMenu');
    var hiddenWrapper = userMenu.querySelector('.hidden-wrapper');

    userMenu.addEventListener('click', function () {
        // Toggle the visibility of the hidden-wrapper
        hiddenWrapper.style.display = (hiddenWrapper.style.display === 'block') ? 'none' : 'block';
    });

    // Close the hidden-wrapper if user clicks outside of it
    document.addEventListener('click', function (event) {
        if (!userMenu.contains(event.target)) {
            hiddenWrapper.style.display = 'none';
        }
    });
});