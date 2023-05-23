const addUserModal = document.getElementById('addUserModal')
if (addUserModal) {
  addUserModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const action = button.getAttribute('data-bs-whatever')
  })
}

const editUserModal = document.getElementById('editUserModal')
if (editUserModal) {
    editUserModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var userId = data[1]
    var userName = data[2]
    var userSurame = data[3]
    var userEmail = data[4]
    var userRole = data[5]

    var modalTitle = editUserModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Edit user " + userName + " " + userSurame
    var nameInput = editUserModal.querySelector('#user-name')
    nameInput.setAttribute("value", userName);
    var surnameInput = editUserModal.querySelector('#user-surname')
    surnameInput.setAttribute("value", userSurame);
    var emailInput = editUserModal.querySelector('#user-email')
    emailInput.setAttribute("value", userEmail);
    var roleSelect = editUserModal.querySelector('#user-role')
    roleSelect.querySelectorAll("option").forEach(option => {
        if (option.value == userRole) {
            option.setAttribute("selected", true);
        }
    });

    var idInput = editUserModal.querySelector('#user-id')
    idInput.setAttribute("value", userId);

  })
}

const deleteUserModal = document.getElementById('deleteUserModal')
if (deleteUserModal) {
    deleteUserModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var userId = data[1]
    var userName = data[2]
    var userSurame = data[3]

    var modalTitle = deleteUserModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Delete user " + userName + " " + userSurame
    var modalWarning = deleteUserModal.querySelector('#deleteWarning')
    modalWarning.innerHTML = "Confirm deletion of user: " + userName + " " + userSurame + "."
    var idInput = deleteUserModal.querySelector('#user-id')
    idInput.setAttribute("value", userId);

  })
}

const addUserRoleModal = document.getElementById('addUserRoleModal')
if (addUserRoleModal) {
    addUserRoleModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const action = button.getAttribute('data-bs-whatever')
  })
}

const editUserRoleModal = document.getElementById('editUserRoleModal')
if (editUserRoleModal) {
    editUserRoleModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var userRoleId = data[1]
    var userRoleName = data[2]
    var userRoleSlug = data[3]

    var modalTitle = editUserRoleModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Edit role " + userRoleName
    var nameInput = editUserRoleModal.querySelector('#user-role-name')
    nameInput.setAttribute("value", userRoleName);
    var slugInput = editUserRoleModal.querySelector('#user-role-slug')
    slugInput.setAttribute("value", userRoleSlug);

    var idInput = editUserRoleModal.querySelector('#user-role-id')
    idInput.setAttribute("value", userRoleId);

  })
}

const deleteUserRoleModal = document.getElementById('deleteUserRoleModal')
if (deleteUserRoleModal) {
    deleteUserRoleModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var userRoleId = data[1]
    var userRoleName = data[2]

    var modalTitle = deleteUserRoleModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Delete role " + userRoleName
    var modalWarning = deleteUserRoleModal.querySelector('#deleteWarning')
    modalWarning.innerHTML = "Confirm deletion of role: " + userRoleName + "."
    var idInput = deleteUserRoleModal.querySelector('#user-role-id')
    idInput.setAttribute("value", userRoleId);

  })
}

const addMenuItemModal = document.getElementById('addMenuItemModal')
if (addMenuItemModal) {
    addMenuItemModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const action = button.getAttribute('data-bs-whatever')
  })
}