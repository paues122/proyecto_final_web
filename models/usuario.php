<?php
require_once "sistema.php";
class Usuario extends Sistema {
    function create($data){
        $this->connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql= ("INSERT INTO usuario (correo, password, token, fecha_token) 
                    VALUES (:correo, :password, null, null)");
            $sth = $this->_DB->prepare($sql);
            $sth->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $pwd = md5($data['password']);
            $sth->bindParam(":password", $pwd, PDO::PARAM_STR);
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
        $sth = $this->_DB->prepare("Select * from usuario");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function readOne($id){
        $this->connect();
        $sth = $this->_DB->prepare("SELECT *
                                    FROM usuario
                                    WHERE id_usuario = :id_usuario");
        $sth->bindParam(":id_usuario", $id, PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function readRole(){
        $this->connect();
        $sth = $this->_DB->prepare("SELECT *
                                    FROM role");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    function readUserRole($id_usuario){
        $this->connect();
        $sth = $this->_DB->prepare("SELECT r.role
                                    FROM usuario_role ur
                                    JOIN role r ON ur.id_role = r.id_role
                                    WHERE ur.id_usuario = :id_usuario");
        $sth->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    function insertRole($data){
        $this->connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql= ("INSERT INTO usuario_role (id_usuario, id_role) 
                    VALUES (:id_usuario, :id_role)");
            $sth = $this->_DB->prepare($sql);
            $sth->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
            $sth->bindParam(":id_role", $data['id_role'], PDO::PARAM_INT);
            $sth->execute();
            $affected_rows = $sth->rowCount();
            $this->_DB -> commit();
            return $affected_rows;
        } catch (Exception $ex) {
            $this->_DB -> rollback();
        }
        return null;
    }

    function deleteRole($data){
        $this->connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "DELETE FROM usuario_role 
                    WHERE id_usuario = :id_usuario AND id_role = :id_role";
            $sth = $this->_DB->prepare($sql);
            $sth->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
            $sth->bindParam(":id_role", $data['id_role'], PDO::PARAM_INT);
            $sth->execute();
            $affected_rows = $sth->rowCount();
            $this->_DB -> commit();
            return $affected_rows;
        } catch (Exception $ex) {
            $this->_DB -> rollback();
        }
        return null;
    }
    
    function update($data, $id){
        if (!is_numeric($id)) {
            return null;    
        }  
        if ($this->validate($data)) {
            $this->connect(); 
            $this -> _DB -> beginTransaction();
            try {
                $sql = "UPDATE usuario set correo = :correo, password = :password 
                        WHERE id_usuario = :id_usuario";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
                $pwd = md5($data['password']);
                $sth -> bindParam(":password", $pwd, PDO::PARAM_STR);
                $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
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
                $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
                $sth = $this->_DB->prepare($sql);
                $sth->bindParam(":id_usuario", $id, PDO::PARAM_INT);
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