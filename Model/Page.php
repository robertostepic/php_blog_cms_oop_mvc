<?php

namespace CMS\Model;

class Page extends Model
{
    public function getAllPages() {
        return $this->getAll("pages");
    }

    public function getPageById($id) {
        return $this->getById("pages", $id);
    }

    public function addPage($arrData) {
        return $this->add("pages", $arrData);
    }

    public function updatePage($id, $arrData) {
        return $this->update("pages", $id,  $arrData);
    }

    public function deletePage($id) {
        return $this->delete("pages", $id);
    } 
    
    public function getAllMenuItems() {
        return $this->getAll("menu_items");
    }

    public function getMenuItemById($id) {
        return $this->getById("menu_items", $id);
    }

    public function addMenuItem($arrData) {
        return $this->add("menu_items", $arrData);
    }

    public function updateMenuItem($id, $arrData) {
        return $this->update("menu_items", $id,  $arrData);
    }

    public function deleteMenuItem($id) {
        return $this->delete("menu_items", $id);
    } 
}