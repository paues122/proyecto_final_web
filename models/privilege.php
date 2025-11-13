<?php
require_once __DIR__."/sistema.php";
class Privilege extends Sistema {
    function create($data){
        $this->connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql= ("INSERT INTO privilege (privilege) 
                    VALUES (:privilege)");
            $sth = $this->_DB->prepare($sql);
            $sth->bindParam(":privilege", $data['privilege'], PDO::PARAM_STR);
            $sth->execute();
            $affected_rows = $sth->rowCount();
            $this->_DB -> commit();
            return $affected_rows;
        } catch (Exception $ex) {
            $this->_DB -> rollback();
        }
        return null;
    }
    function read(){
        $this->connect();
        $sth = $this->_DB->prepare("Select * from privilege");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function readOne($id){
        $this->connect();
        $sth = $this->_DB->prepare("SELECT *
                                    FROM privilege
                                    WHERE id_privilege = :id_privilege");
        $sth->bindParam(":id_privilege", $id, PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data, $id){
        if (!is_numeric($id)) {
            return null;    
        }  
        if ($this->validate($data)) {
            $this->connect(); 
            $this -> _DB -> beginTransaction();
            try {
                $sql = "UPDATE privilege set privilege = :privilege
                        WHERE id_privilege = :id_privilege";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":privilege", $data['privilege'], PDO::PARAM_STR);
                $sth -> bindParam(":id_privilege", $id, PDO::PARAM_INT);
                $sth -> execute(); 
                $affected_rows = $sth->rowCount();  
                $this->_DB -> commit();
                return $affected_rows;
            } catch (Exception $ex) {
                $this -> _DB ->rollback();
            }
            return null;
        } 
        return null;
    }
    function delete($id){
        if (is_numeric($id)) {
            $this->connect();
            $this-> _DB -> beginTransaction();
            try {
                $sql = "DELETE FROM privilege WHERE id_privilege = :id_privilege";
                $sth = $this->_DB->prepare($sql);
                $sth->bindParam(":id_privilege", $id, PDO::PARAM_INT);
                $sth->execute();
                $affected_rows = $sth->rowCount();
                $this->_DB -> commit();
                return $affected_rows;
            } catch (Exception $ex) {
                $this->_DB -> rollback();
            }
            return null;
        }else {
            return null;
        }
    }
    function validate($data){
        
        return true;
    }
}
?>