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

        if (isset($_POST['page-title'], $_POST['page-description'], $_POST['page-slug'])) {

            $arrData = array($_POST['page-title'], $_POST['page-description'], "", $_POST['page-slug'], date("Y-m-d H:i:s"));
            $this->oModel->addPage($arrData);

            $this->oUtil->sNotify = "Page added.";
    
        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");
    }

    public function editPage()
    {
        if (!$this->isLogged()) exit;

        $id = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
        
        if (isset($_POST['page-title'], $_POST['page-description'], $_POST['page-slug'], $_POST['page-body'])) {
            
            $arrData = array(
                "title = '" . $_POST['page-title'] . "'", 
                "description = '" . $_POST['page-description'] . "'",
                "slug = '" . $_POST['page-slug'] . "'",
                "body = '" . $_POST['page-body'] . "'"
            );
            $this->oModel->updatePage($id, $arrData);
            
            $this->oUtil->sNotify = "Page updated.";
            
        }
        
        if (isset($_POST['image-id']) && strlen($_POST['image-id']) > 0 && $_POST["image-id"] != "Select image") {

            $pageBody = $this->oModel->getPageById($id)[0]->body;

            $arrData = array(
                "body = '" . $pageBody . "\n\n[img-" . $_POST['image-id'] . "]\n\n" . "'"
            );
            $this->oModel->updatePage($id, $arrData);
            
            $this->oUtil->sNotify = "Image added.";
        
        }

        if (isset($_FILES['image-file'])) {

            $target_dir = "static/assets/upload/";
            $target_file = $target_dir . basename($_FILES["image-file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            $check = getimagesize($_FILES["image-file"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            if (file_exists($target_file)) {
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                $this->oUtil->sNotify = "Error in image upload.";
            } else {
                if (move_uploaded_file($_FILES["image-file"]["tmp_name"], $target_file)) {

                    $pageBody = $this->oModel->getPageById($id)[0]->body;

                    $arrData = array($id, $target_file);
                    $this->oModel->addImage($arrData);
                    
                    $imageId = end($this->oModel->getAllImages())->id;

                    $arrData = array(
                        "body = '" . $pageBody . "\n\n[img-" . $imageId . "]\n\n" . "'"
                    );
                    $this->oModel->updatePage($id, $arrData);
                    
                    $this->oUtil->sNotify = "Image added.";
                    
                } else {
                    $this->oUtil->sNotify = "Error in image upload.";
                }
            }
        
        }

        $this->oUtil->page = $this->oModel->getPageById($id)[0];
        $this->oUtil->images = $this->oModel->getAllImages();

        
        $this->oUtil->getView('edit_page');

    }

    public function deletePage()
    {
        if (!$this->isLogged()) exit;

        if (isset($_POST['page-id'])) {

            $this->oModel->deletePage((int) $_POST['page-id']);
    
            $this->oUtil->sNotify = "Page deleted.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function addMenuItem()
    {
        if (!$this->isLogged()) exit;

        if (isset($_POST['menu-item-display-text'], $_POST['menu-item-page-id'], $_POST['menu-item-parent'])) {
            
            $arrData = array($_POST['menu-item-display-text'], $_POST['menu-item-page-id'], (int) $_POST['menu-item-parent']);
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

        if (isset($_POST['menu-item-id'], $_POST['menu-item-display-text'], $_POST['menu-item-page-id'], $_POST['menu-item-parent'])) {

            $arrData = array(
                "display_text = '" . $_POST['menu-item-display-text'] . "'", 
                "page_id = " . $_POST['menu-item-page-id'],
                "parent = " . $_POST['menu-item-parent']
            );
            $this->oModel->updateMenuItem($_POST['menu-item-id'], $arrData);
    
            $this->oUtil->sNotify = "Changes saved.";

        } else {
            $this->oUtil->sNotify = "An error occured. Please try again";
        }

        $this->resetDashboard();

        $this->oUtil->getView("dashboard");

    }

    public function deleteMenuItem()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->getView("dashboard");

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