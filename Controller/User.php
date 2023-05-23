<?php

namespace CMS\Controller;

class User {

    protected $oUtil, $oModel, $users, $userRoles, $pages, $menuItems;

    public function __construct()
    {
        if (empty($_SESSION)) {
            @session_start();
        }

        $this->oUtil = new \CMS\Config\Util;

        $this->oUtil->getModel("User");
        $this->oModel = new \CMS\Model\User;

    }

    public function login()
    {
        if ($this->isLogged())
        {
            $this->oUtil->getView("index");
        }

        if (isset($_POST['email'], $_POST['password']))
        {
            $sHashPassword = $this->oModel->login($_POST['email']);
            if (password_verify($_POST['password'], $sHashPassword))
            {
                $_SESSION['is_logged'] = 1;
                $this->oUtil->getView("index");
                exit;
            }
            else
            {
                $this->oUtil->sNotify = "Incorrect credentials. Try again.";
            }
        }

        $this->oUtil->getView("login");
    }

    public function logout()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (!empty($_SESSION))
        {
            $_SESSION = array();
            @session_unset();
            @session_destroy();
        }

        $this->oUtil->getView("index");
        exit;
    }

    public function addUser()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (isset($_POST['user-name'], $_POST['user-surname'], $_POST['user-email'], $_POST['user-password'], $_POST['user-role'])) {

            $sHash = password_hash($_POST['user-password'], PASSWORD_DEFAULT);
            
            $arrData = array($_POST['user-email'], $sHash, $_POST['user-name'], $_POST['user-surname'], (int) $_POST['user-role']);
            $this->oModel->addUser($arrData);

            $this->oUtil->sNotify = "User added.";
    
        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");
    }

    public function editUser()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (isset($_POST['user-id'], $_POST['user-name'], $_POST['user-surname'], $_POST['user-email'], $_POST['user-role'])) {

            $arrData = array(
                "email = '" . $_POST['user-email'] . "'", 
                "name = '" . $_POST['user-name'] . "'",
                "surname = '" . $_POST['user-surname'] . "'",
                "user_role = " . $_POST['user-role']
            );
            $this->oModel->updateUser($_POST['user-id'], $arrData);
    
            $this->oUtil->sNotify = "Changes saved.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function deleteUser()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (isset($_POST['user-id'])) {

            $this->oModel->deleteUser((int) $_POST['user-id']);
    
            $this->oUtil->sNotify = "User deleted.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function addUserRole()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (isset($_POST['user-role-name'], $_POST['user-role-slug'])) {
            
            $arrData = array($_POST['user-role-name'], $_POST['user-role-slug']);
            $this->oModel->addUserRole($arrData);

            $this->oUtil->sNotify = "User role added.";
    
        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");
    }

    public function editUserRole()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        if (isset($_POST['user-role-id'], $_POST['user-role-name'], $_POST['user-role-slug'])) {

            $arrData = array(
                "name = '" . $_POST['user-role-name'] . "'",
                "slug = '" . $_POST['user-role-slug'] . "'"
            );
            $this->oModel->updateUserRole($_POST['user-role-id'], $arrData);
    
            $this->oUtil->sNotify = "Changes saved.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function deleteUserRole()
    {
        if (!$this->isLogged())
        {
            exit;
        }

        var_dump($_POST["user-role-id"]);
        if (isset($_POST['user-role-id'])) {

            $this->oModel->deleteUserRole((int) $_POST['user-role-id']);
    
            $this->oUtil->sNotify = "User role deleted.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }


        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }

    private function resetDashboard() {
        $this->oUtil->users = $this->oModel->getAllUsers();
        $this->oUtil->userRoles = $this->oModel->getAllUserRoles();
        
        $helperModel = new \CMS\Model\Page;
        
        $this->oUtil->pages = $helperModel->getAllPages();
        $this->oUtil->menuItems = $helperModel->getAllMenuItems();
    }

}