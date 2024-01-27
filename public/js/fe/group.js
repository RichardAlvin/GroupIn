document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var activeGroup = urlParams.get('Group');

    var modal = document.getElementById('modal');
    var modalMember = document.getElementById('modalMember');

    var createButton = document.getElementById('createButton');
    var closeBtn = document.getElementsByClassName('close')[0];
    var cancelButton = document.getElementById('cancelButton');

    var detailMember = document.getElementById('detailMember');

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

    detailMember.onclick = function () {
        modal.style.display = 'none';
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
});

function confirmGroupJoin(isOpen, groupName) {
    if (isOpen) {
        // If the group is open, confirm before proceeding
        return confirm('Are you sure you want to join ' + groupName + '?');
    } else {
        // If the group is closed, show an alert
        alert('This group is closed for joining.');
        return false; // Halt form submission
    }
}