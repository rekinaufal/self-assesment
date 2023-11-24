let allUsers = null;
const storedSelectedUsers = JSON.parse(sessionStorage.getItem('selectedUsers')) || [];

$(document).ready(() => {
    fetchData();

    storedSelectedUsers.forEach(pageUsers => pageUsers.forEach(({ id, isChecked }) => {
        $(`.checkbox-users[data-id="${id}"]`).prop('checked', isChecked);
        hasSelectedUsers();
    }));

    $('.checkbox-users').change(updateSelectedUsers);
    $('#deleteSelectedUsers').click(handleDeleteSelectedUsers);
    $("#uncheckAll, #checkAll").click(handleCheckUncheck);
});

async function fetchData() {
    try {
        const response = await fetch('/json/users');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        allUsers = await response.json();
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

function updateSelectedUsers() {
    const selectedUsersInPage = $('.checkbox-users').map(function () {
        return {
            id: $(this).data('id'),
            isChecked: this.checked
        };
    }).get();

    const newSelectedUsers = storedSelectedUsers.filter(pageUsers => pageUsers[0].id !== selectedUsersInPage[0].id);
    newSelectedUsers.push(selectedUsersInPage);

    sessionStorage.setItem('selectedUsers', JSON.stringify(newSelectedUsers));
    hasSelectedUsers();
}

function handleDeleteSelectedUsers() {
    const deleteSelectedUsers = JSON.parse(sessionStorage.getItem('selectedUsers')) || [];
    let canDelete = false;
    let deleteIds = [];

    for (let i = 0; i < deleteSelectedUsers.length; i++) {
        let hasSelectedUsers = deleteSelectedUsers[i].filter(f => f.isChecked === true);
        if (hasSelectedUsers.length > 0) {
            canDelete = true;
            hasSelectedUsers.forEach((users) => deleteIds.push(users.id));
        }
    }

    if (!canDelete) {
        showErrorMessage("Can't delete batch. Nothing users is selected");
    } else {
        swal({
            title: "Warning",
            text: `${deleteIds.length} users has checked, are you sure want to delete it?`,
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                deleteIds = JSON.stringify(deleteIds);
                $('#usersWantDelete').val(deleteIds);
                $('#formDeleteBatch').submit();
            }
        });
    }
}

function handleCheckUncheck() {
    sessionStorage.removeItem("selectedUsers");

    if ($(this).attr("id") === "checkAll") {
        let mappingUsers = allUsers.map((item) => ({ id: item.id, isChecked: true }));
        let newMappingUsers = [];

        for (let i = 0; i < mappingUsers.length; i += 6) {
            newMappingUsers.push(mappingUsers.slice(i, i + 6));
        }

        sessionStorage.setItem("selectedUsers", JSON.stringify(newMappingUsers));
    }
    location.reload();
}

function showErrorMessage(message) {
    swal({
        title: "Error",
        text: message,
        icon: "error",
        button: false,
        timer: 2500
    });
}

function hasSelectedUsers() {
    const storedSelectedUsers = JSON.parse(sessionStorage.getItem('selectedUsers')) || [];
    let hasSelectedUsers = storedSelectedUsers.some(selectedUsers => selectedUsers.some(users => users.isChecked == true));
    if (hasSelectedUsers) {
        $("#dropdownSelectedAction").removeClass("d-none");
    } else {
        $("#dropdownSelectedAction").addClass("d-none");
    }
}
