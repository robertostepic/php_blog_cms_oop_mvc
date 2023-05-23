<?php

namespace CMS\Model;

class User extends Model {

    public function getAllUsers() {
        return $this->getAll("users");
    }

    public function getUserById($id) {
        return $this->getById("users", $id);
    }

    public function addUser($arrData) {
        return $this->add("users", $arrData);
    }

    public function updateUser($id, $arrData) {
        return $this->update("users", $id,  $arrData);
    }

    public function deleteUser($id) {
        return $this->delete("users", $id);
    }

    public function login($sEmail) {
        $oStmt = $this->oDb->prepare("SELECT email, password FROM users where email = '" . $sEmail . "' LIMIT 1");
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);
        return @$oRow->password;
    }
    
    public function getAllUserRoles() {
        return $this->getAll("user_roles");
    }

    public function getUserRoleById($id) {
        return $this->getById("user_roles", $id);
    }

    public function addUserRole($arrData) {
        return $this->add("user_roles", $arrData);
    }

    public function updateUserRole($id, $arrData) {
        return $this->update("user_roles", $id,  $arrData);
    }

    public function deleteUserRole($id) {
        return $this->delete("user_roles", $id);
    }

}