<?php

namespace CMS\Controller;

class Page
{
    protected $oUtil, $oModel, $users, $userRoles, $pages, $menuItems;
    private $pageId;

    public function __construct()
    {
        if (empty($_SESSION)) {
            @session_start();
        }

        $this->oUtil = new \CMS\Config\Util;

        $this->oUtil->getModel("Page");
        $this->oModel = new \CMS\Model\Page;

        $this->pageId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function index()
    {
        $this->oUtil->getView('index');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }

    public function dashboard()
    {
        if (!$this->isLogged()) exit;

        $helperModel = new \CMS\Model\User;
        
        $this->oUtil->users = $helperModel->getAllUsers();
        $this->oUtil->userRoles = $helperModel->getAllUserRoles();
        
        $this->oUtil->pages = $this->oModel->getAllPages();
        $this->oUtil->menuItems = $this->oModel->getAllMenuItems();

        $this->oUtil->getView('dashboard');
    }

    public function addPage()
    {
        if (!$this->isLogged()) exit;

    }

    public function editPage()
    {
        if (!$this->isLogged()) exit;

    }

    public function deletePage()
    {
        if (!$this->isLogged()) exit;

    }

    public function addMenuItem()
    {
        if (!$this->isLogged()) exit;

        if (isset($_POST['menu-item-display-text'], $_POST['menu-item-page-slug'], $_POST['menu-item-parent'])) {
            
            $arrData = array($_POST['menu-item-display-text'], $_POST['menu-item-page-slug'], (int) $_POST['menu-item-parent']);
            $this->oModel->addMenuItem($arrData);

            $this->oUtil->sNotify = "Menu item added.";
    
        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function editMenuItem()
    {
        if (!$this->isLogged()) exit;

    }

    public function deleteMenuItem()
    {
        if (!$this->isLogged()) exit;

    }

    public function viewPage()
    {
        $this->oUtil->getView('page');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }

    private function resetDashboard() {

        $helperModel = new \CMS\Model\User;
        
        $this->oUtil->users = $helperModel->getAllUsers();
        $this->oUtil->userRoles = $helperModel->getAllUserRoles();
        
        $this->oUtil->pages = $this->oModel->getAllPages();
        $this->oUtil->menuItems = $this->oModel->getAllMenuItems();
    }
}