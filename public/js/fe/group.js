document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var activeGroup = urlParams.get('Group');

    var modal = document.getElementById('modal');
    var createButton = document.getElementById('createButton');
    var closeBtn = document.getElementsByClassName('close')[0];
    var cancelButton = document.getElementById('cancelButton');

    if (activeGroup) {
        var menuItems = document.querySelectorAll('.group-search-menu');
        menuItems.forEach(function(item) {
            item.classList.remove('active');
        });

        var activeMenuItem = document.querySelector('.group-search-menu[data-group="' + activeGroup + '"]');
        if (activeMenuItem) {
            activeMenuItem.classList.add('active');
        }
    }

    createButton.onclick = function () {
        modal.style.display = 'block';
    };

    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };

    cancelButton.onclick = function () {
        modal.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
});