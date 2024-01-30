document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var activeGroup = urlParams.get('Group');

    var modalCreateGroup = document.getElementById('modal');
    //var modalJoinGroup = document.getElementById('modalJoinGroup');

    var createButton = document.getElementById('createButton');
    //var joinGroupButton = document.getElementById('join-group');
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
        modalCreateGroup.style.display = 'block';
    };

    joinGroupButton.onclick = function () {
        modalJoinGroup.style.display = 'block';
    }

    closeBtn.onclick = function () {
        modalCreateGroup.style.display = 'none';
    };

    cancelButton.onclick = function () {
        modalCreateGroup.style.display = 'none';
    };

    detailMember.onclick = function () {
        modalMember.style.display = 'none';
    }


    // Close modal when user clicks outside of it
    window.onclick = function(event) {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            var modal = modals[i];
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
});

function confirmGroupJoin(isOpen, pendingMember) {
    if (isOpen) {
        // If the group is open, confirm before proceeding
        return confirm('Are you sure you want to accept ' + pendingMember + '?');
    } else {
        // If the group is closed, show an alert
        alert('This group is closed for joining.');
        return false; // Halt form submission
    }
}

//join group modal
function openModal(groupId) {
    var modal = document.getElementById('groupModal' + groupId);
    modal.style.display = "block";
}

function closeModal(groupId) {
    var modal = document.getElementById('groupModal' + groupId);
    modal.style.display = "none";
}


//Pending Modal
function openModalPending(groupId) {
    var modal = document.getElementById('groupModalPending' + groupId);
    modal.style.display = "block";
}

function closeModalPending(groupId) {
    var modal = document.getElementById('groupModalPending' + groupId);
    modal.style.display = "none";
}

//Member Modal
function openModalMember(groupId) {
    var modal = document.getElementById('modalMember' + groupId);
    modal.style.display = "block";
}

function closeModalMember(groupId) {
    var modal = document.getElementById('modalMember' + groupId);
    modal.style.display = "none";
}