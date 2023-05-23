<?php

namespace CMS\Model;

class Model {
    protected $oDb;

    public function __construct() {
        $this->oDb = new \CMS\Config\DB;
    }

    public function getAll($table) {
        $oStmt = $this->oDb->query("SELECT * FROM " . $table);
        return $oStmt->fetchAll(\PDO::FETCH_OBJ); 
    }

    public function getById($table, $id) {
        $oStmt = $this->oDb->query("SELECT * FROM " . $table . " WHERE id = " . $id . " LIMIT 1");
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add($table, $arrData) {
        $values = $this->join($arrData);
        $next_id = ((int) $this->getMaxId($table)[0]->max_id ) + 1;
        $oStmt = $this->oDb->prepare("INSERT INTO " . $table . " VALUES (" . $next_id . ", " . $values . ")");
        return $oStmt->execute();
    }

    public function update($table, $id, $arrData) {
        $values = implode(", ", $arrData);
        $oStmt = $this->oDb->prepare("UPDATE " . $table . " SET " . $values . " WHERE id = " . $id . " LIMIT 1");
        return $oStmt->execute();
    }

    public function delete($table, $id) {
        $oStmt = $this->oDb->prepare("DELETE FROM " . $table . " WHERE id = " . $id . " LIMIT 1");
        return $oStmt->execute();
    }

    private function getMaxId($table) {
        $oStmt = $this->oDb->query("SELECT MAX(id) as max_id FROM " . $table);
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    private function join($arrData) {
        $values = "";
        foreach ($arrData as $index => $value) {
            if (gettype($value) == "string") {
                $values .= "'" . $value . "'";
            } else {
                $values .= $value;
            }
            if ($index < count($arrData) - 1) {
                $values .= ", ";
            }
        }
        return $values;
    }
}