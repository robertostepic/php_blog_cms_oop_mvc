<?php require 'inc/header.php' ?>

<div class="container px-5 my-5">
    <?php require 'inc/notify.php' ?>
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Dashboard</span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Users</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal" data-bs-whatever="@add">
                        <div class="d-inline-block bi bi-person-plus me-2"></div>
                        Add user
                    </button>
                </div>
                <!-- User Card -->
                <?php if (count($this->users) == 0): ?>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4">
                        No users found.
                    </div>
                </div>
                <?php endif; ?>
                <?php foreach ($this->users as $user): ?>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="bg-light p-3 rounded-4">
                                    <div class="text-primary fw-bolder mb-2"><?=$user->name?> <?=$user->surname?></div>
                                    <?php
                                    $currentRole = "Administrator";
                                    foreach ($this->userRoles as $userRole) {
                                        if ($userRole->id == $user->user_role) {
                                            $currentRole = $userRole->name;
                                        }
                                    }
                                    ?>
                                    <div class="small fw-bolder"><?=$currentRole?></div>
                                    <div class="small text-muted"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    Email: <?=$user->email?>
                                </div>
                                <div>
                                    Last log-in: Today
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <button type="button" class="btn btn-light px-3 py-1" data-bs-toggle="modal" data-bs-target="#editUserModal" data-bs-whatever="@edit|<?=$user->id?>|<?=$user->name?>|<?=$user->surname?>|<?=$user->email?>|<?=$user->user_role?>">
                                        <div class="d-inline-block bi bi-person-gear me-2"></div>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger px-3 py-1" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-bs-whatever="@delete|<?=$user->id?>|<?=$user->name?>|<?=$user->surname?>">
                                        <div class="d-inline-block bi bi-person-x me-2"></div>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>

            <section>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-2 me-3 px-3 py-1"><i class="bi bi-people"></i></div>
                                    <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">User roles</span></h3>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserRoleModal" data-bs-whatever="@add">
                                    <div class="d-inline-block bi bi-plus-square me-2"></div>
                                    Add user role
                                </button>
                            </div>
                            <?php $count = 0; ?>
                            <?php foreach ($this->userRoles as $userRole): ?>
                                <?php if ($count % 3 == 0): ?>
                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                <?php endif; ?>
                                <?php if ($count % 3 <= 1): ?>
                                <div class="col mb-4 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-between bg-light rounded-4 p-3 h-100">
                                        <?= $userRole->name; ?>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-light px-2 py-1 me-2" data-bs-toggle="modal" data-bs-target="#editUserRoleModal" data-bs-whatever="@edit|<?=$userRole->id?>|<?=$userRole->name?>|<?=$userRole->slug?>">
                                                <div class="d-inline-block bi bi-pencil-square"></div>
                                            </button>
                                            <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteUserRoleModal" data-bs-whatever="@delete|<?=$userRole->id?>|<?=$userRole->name?>">
                                                <div class="d-inline-block bi bi-x-square"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col">
                                    <div class="d-flex align-items-center justify-content-between bg-light rounded-4 p-3 h-100">
                                        <?= $userRole->name; ?>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-light px-2 py-1 me-2" data-bs-toggle="modal" data-bs-target="#editUserRoleModal" data-bs-whatever="@edit|<?=$userRole->id?>|<?=$userRole->name?>|<?=$userRole->slug?>">
                                                <div class="d-inline-block bi bi-pencil-square"></div>
                                            </button>
                                            <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteUserRoleModal" data-bs-whatever="@delete|<?=$userRole->id?>|<?=$userRole->name?>">
                                                <div class="d-inline-block bi bi-x-square"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php endif; ?>
                                <?php $count++; ?>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="pb-5"></div>

            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-4">Pages</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPageModal" data-bs-whatever="@add">
                        <div class="d-inline-block bi bi-window-plus me-2"></div>
                        Add page
                    </button>
                </div>
                <!-- Page Card-->
                <?php if (count($this->pages) == 0): ?>
                    <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4">
                        No pages found.
                    </div>
                </div>
                <?php endif; ?>
                <?php foreach ($this->pages as $page): ?>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                <div class="bg-light p-4 rounded-4">
                                    <div class="text-secondary fw-bolder mb-2">Homepage</div>
                                    <div class="mb-2">
                                        <div class="small fw-bolder">May 13, 2023</div>
                                    </div>
                                    <div class="fst-italic">
                                        <div class="small text-muted">Author: Ime Prezime</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4"><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus laudantium, voluptatem quis repellendus eaque sit animi illo ipsam amet officiis corporis sed aliquam non voluptate corrupti excepturi maxime porro fuga.</div></div>
                            <div class="col-lg-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <a class="btn btn-light px-3 py-1" href="#!">
                                        <div class="d-inline-block bi bi-pencil me-2"></div>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger px-3 py-1" href="#!">
                                        <div class="d-inline-block bi bi-person-x me-2"></div>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>

            <section>
                <h2 class="text-secondary fw-bolder mb-4">Navigation</h2>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-2 me-3 px-3 py-1"><i class="bi bi-menu-app"></i></div>
                                    <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Menu items</span></h3>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenuItemModal" data-bs-whatever="@add">
                                    <div class="d-inline-block bi bi-plus-square me-2"></div>
                                    Add menu item
                                </button>
                            </div>
                            <?php $count = 0; ?>
                            <?php foreach ($this->menuItems as $menuItem): ?>
                                <?php if ($count % 3 == 0): ?>
                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                <?php endif; ?>
                                <?php if ($count % 3 <= 1): ?>
                                <div class="col mb-4 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-between bg-light rounded-4 p-3 h-100">
                                        <?= $menuItem->display_text; ?>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-light px-2 py-1 me-2" data-bs-toggle="modal" data-bs-target="#editMenuItemModal" data-bs-whatever="@edit|<?=$menuItem->id?>|<?=$menuItem->display_text?>|<?=$menuItem->page_slug?>">
                                                <div class="d-inline-block bi bi-pencil-square"></div>
                                            </button>
                                            <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteMenuItemModal" data-bs-whatever="@delete|<?=$menuItem->id?>|<?=$menuItem->display_text?>">
                                                <div class="d-inline-block bi bi-x-square"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col">
                                    <div class="d-flex align-items-center justify-content-between bg-light rounded-4 p-3 h-100">
                                        <?= $menuItem->display_text; ?>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-light px-2 py-1 me-2" data-bs-toggle="modal" data-bs-target="#editMenuItemModal" data-bs-whatever="@edit|<?=$menuItem->id?>|<?=$menuItem->display_text?>|<?=$menuItem->page_slug?>">
                                                <div class="d-inline-block bi bi-pencil-square"></div>
                                            </button>
                                            <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteMenuItemModal" data-bs-whatever="@delete|<?=$menuItem->id?>|<?=$menuItem->display_text?>">
                                                <div class="d-inline-block bi bi-x-square"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php endif; ?>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                            <?php if ($count == 0): ?>
                            <div>
                                No menu items found.
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
</div>


<!-- Add user modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="addUserModalLabel">New user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="addUserForm" method="post" action="?p=user&a=addUser">
        <div class="mb-3">
            <label for="user-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="user-name" name="user-name" required>
        </div>
        <div class="mb-3">
            <label for="user-surname" class="col-form-label">Surname:</label>
            <input type="text"class="form-control" id="user-surname" name="user-surname" required>
        </div>
        <div class="mb-3">
            <label for="user-email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="user-email" name="user-email" required>
        </div>
        <div class="mb-3">
            <label for="user-password" class="col-form-label">Password:</label>
            <input type="text" class="form-control" id="user-password" name="user-password" required>
        </div>
        <div class="mb-3">
            <label for="user-role" class="col-form-label">Role:</label>
            <select class="form-select" aria-label="Select user role" id="user-role" name="user-role">
                <option selected>Select user role</option>
                <?php foreach ($this->userRoles as $userRole): ?>
                <option value="<?=$userRole->id?>"><?=$userRole->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addUserForm" class="btn btn-primary" name="addUser">Add user</button>
    </div>
    </div>
</div>
</div>

<!-- Edit user modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="editUserModalLabel">Edit user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="editUserForm" method="post" action="?p=user&a=editUser">
        <div class="mb-3">
            <label for="user-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="user-name" name="user-name" required>
        </div>
        <div class="mb-3">
            <label for="user-surname" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="user-surname" name="user-surname" required>
        </div>
        <div class="mb-3">
            <label for="user-email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="user-email" name="user-email" required>
        </div>
        <div class="mb-3">
            <label for="user-password" class="col-form-label">Password (won't be changed if empty):</label>
            <input type="password" class="form-control" id="user-password" name="user-password" placeholder="xxxxxxxx">
        </div>
        <div class="mb-3">
            <label for="user-role" class="col-form-label">Role:</label>
            <select class="form-select" aria-label="Select user role" id="user-role" name="user-role">
                <option selected>Select user role</option>
                <?php foreach ($this->userRoles as $userRole): ?>
                <option value="<?=$userRole->id?>"><?=$userRole->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="number" class="form-control" id="user-id" name="user-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editUserForm" class="btn btn-primary" name="editUser">Save changes</button>
    </div>
    </div>
</div>
</div>

<!-- Delete user modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="deleteUserForm" method="post" action="?p=user&a=deleteUser">
            <div class="mb-3" id="deleteWarning">
                Confirm deletion of user: 
            </div>
            <input type="number" class="form-control" id="user-id" name="user-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="deleteUserForm" class="btn btn-danger" name="deleteUser">Delete user</button>
    </div>
    </div>
</div>
</div>

<!-- Add user role modal -->
<div class="modal fade" id="addUserRoleModal" tabindex="-1" aria-labelledby="addUserRoleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="addUserRoleModalLabel">New user role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="addUserRoleForm" method="post" action="?p=user&a=addUserRole">
        <div class="mb-3">
            <label for="user-role-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="user-role-name" name="user-role-name" required>
        </div>
        <div class="mb-3">
            <label for="user-role-slug" class="col-form-label">Slug:</label>
            <input type="text"class="form-control" id="user-role-slug" name="user-role-slug" required>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addUserRoleForm" class="btn btn-primary" name="addUserRole">Add user role</button>
    </div>
    </div>
</div>
</div>

<!-- Edit user role modal -->
<div class="modal fade" id="editUserRoleModal" tabindex="-1" aria-labelledby="editUserRoleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="editUserRoleModalLabel">Edit user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="editUserRoleForm" method="post" action="?p=user&a=editUserRole">
        <div class="mb-3">
            <label for="user-role-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="user-role-name" name="user-role-name" required>
        </div>
        <div class="mb-3">
            <label for="user-role-slug" class="col-form-label">Slug:</label>
            <input type="text" class="form-control" id="user-role-slug" name="user-role-slug" required>
        </div>
        <input type="number" class="form-control" id="user-role-id" name="user-role-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editUserRoleForm" class="btn btn-primary" name="editUserRole">Save changes</button>
    </div>
    </div>
</div>
</div>

<!-- Delete user role modal -->
<div class="modal fade" id="deleteUserRoleModal" tabindex="-1" aria-labelledby="deleteUserRoleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteUserRoleModalLabel">Delete user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="deleteUserRoleForm" method="post" action="?p=user&a=deleteUserRole">
            <div class="mb-3" id="deleteWarning">
                Confirm deletion of user role: 
            </div>
            <input type="number" class="form-control" id="user-role-id" name="user-role-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="deleteUserRoleForm" class="btn btn-danger" name="deleteUserRole">Delete role</button>
    </div>
    </div>
</div>
</div>

<!-- Add menu item modal -->
<div class="modal fade" id="addMenuItemModal" tabindex="-1" aria-labelledby="addMenuItemModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="addMenuItemModalLabel">New menu item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="addMenuItemForm" method="post" action="?p=page&a=addMenuItem">
        <div class="mb-3">
            <label for="menu-item-display-text" class="col-form-label">Display text:</label>
            <input type="text" class="form-control" id="menu-item-display-text" name="menu-item-display-text" required>
        </div>
        <div class="mb-3">
            <label for="menu-item-page-slug" class="col-form-label">Page slug:</label>
            <input type="text"class="form-control" id="menu-item-page-slug" name="menu-item-page-slug" required>
        </div>
        <div class="mb-3">
            <label for="menu-item-parent" class="col-form-label">Parent (select root if it's main menu item):</label>
            <select class="form-select" aria-label="Select menu item" id="menu-item-parent" name="menu-item-parent">
                <option value="0" selected>Main menu</option>
                <?php foreach ($this->menuItems as $menuItem): ?>
                    <?php if ($menuItem->parent == 0): ?>
                <option value="<?=$menuItem->id?>"><?=$menuItem->display_text?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="addMenuItemForm" class="btn btn-primary" name="addMenuItem">Add menu item</button>
    </div>
    </div>
</div>
</div>

<!-- Edit menu item modal -->
<div class="modal fade" id="editUserRoleModal" tabindex="-1" aria-labelledby="editUserRoleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="editUserRoleModalLabel">Edit user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="editUserRoleForm" method="post" action="?p=page&a=editUserRole">
        <div class="mb-3">
            <label for="user-role-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="user-role-name" name="user-role-name" required>
        </div>
        <div class="mb-3">
            <label for="user-role-slug" class="col-form-label">Slug:</label>
            <input type="text" class="form-control" id="user-role-slug" name="user-role-slug" required>
        </div>
        <input type="number" class="form-control" id="user-role-id" name="user-role-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editUserRoleForm" class="btn btn-primary" name="editUserRole">Save changes</button>
    </div>
    </div>
</div>
</div>

<!-- Delete menu item modal -->
<div class="modal fade" id="deleteMenuItemModal" tabindex="-1" aria-labelledby="deleteMenuItemModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteMenuItemModalLabel">Delete menu item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="deleteMenuItemForm" method="post" action="?p=page&a=deleteMenuItem">
            <div class="mb-3" id="deleteWarning">
                Confirm deletion of menu item: 
            </div>
            <input type="number" class="form-control" id="menu-item-id" name="menu-item-id" hidden>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="deleteMenuItemForm" class="btn btn-danger" name="deleteMenuItem">Delete item</button>
    </div>
    </div>
</div>
</div>

<?php require 'inc/footer.php' ?>