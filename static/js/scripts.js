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

const deletePageModal = document.getElementById('deletePageModal')
if (deletePageModal) {
  deletePageModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var pageId = data[1]
    var pageTitle = data[2]

    var modalTitle = deletePageModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Delete page " + pageTitle
    var modalWarning = deletePageModal.querySelector('#deleteWarning')
    modalWarning.innerHTML = "Confirm deletion of page: " + pageTitle + "."
    var idInput = deletePageModal.querySelector('#page-id')
    idInput.setAttribute("value", pageId);

  })
}

const addMenuItemModal = document.getElementById('addMenuItemModal')
if (addMenuItemModal) {
    addMenuItemModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const action = button.getAttribute('data-bs-whatever')
  })
}

const editMenuItemModal = document.getElementById('editMenuItemModal')
if (editMenuItemModal) {
  editMenuItemModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var menuItemId = data[1]
    var menuItemDisplayText = data[2]
    var menuItemPageId = data[3]
    var menuItemParentId = data[4]
    var modalTitle = editMenuItemModal.querySelector('#editMenuItemModalLabel')
    modalTitle.innerHTML = "Edit menu item " + menuItemDisplayText
    var displayTextInput = editMenuItemModal.querySelector('input#menu-item-display-text')
    displayTextInput.setAttribute("value", menuItemDisplayText);
    var pageSelect = editMenuItemModal.querySelector('#menu-item-page-id')
    pageSelect.querySelectorAll("option").forEach(option => {
        if (option.value == menuItemPageId) {
            option.setAttribute("selected", true);
        }
    });
    var parentSelect = editMenuItemModal.querySelector('#menu-item-parent')
    parentSelect.querySelectorAll("option").forEach(option => {
        if (option.value == menuItemParentId) {
            option.setAttribute("selected", true);
        }
    });
    var idInput = editMenuItemModal.querySelector('#menu-item-id')
    idInput.setAttribute("value", menuItemId);

  })
}

const deleteMenuItemModal = document.getElementById('deleteMenuItemModal')
if (deleteMenuItemModal) {
  deleteMenuItemModal.addEventListener('show.bs.modal', event => {
    var button = event.relatedTarget
    var data = button.getAttribute('data-bs-whatever').split("|")
    var menuItemId = data[1]
    var menuItemDisplayText = data[2]

    var modalTitle = deleteMenuItemModal.querySelector('.modal-title')
    modalTitle.innerHTML = "Delete menu item " + menuItemDisplayText
    var modalWarning = deleteMenuItemModal.querySelector('#deleteWarning')
    modalWarning.innerHTML = "Confirm deletion of menu item: " + menuItemDisplayText + "."
    var idInput = deleteMenuItemModal.querySelector('#menu-item-id')
    idInput.setAttribute("value", menuItemId);

  })
}
