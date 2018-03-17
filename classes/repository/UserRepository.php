<?php
class UserRepository {
    
    public static function listar() {
        
        $pdo = Conexion::getConexion();
        
        $sql = "select id, username, password, nombres, roles_id, email
                from usuarios
                order by id desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $lista = [];
        while($objeto = $stmt->fetchObject('usuarios')){
            $lista[] = $objeto;
        }
        
        return $lista;
    }
    
    public static function registrar(Usuarios $usuarios) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "insert into usuarios (username, password, nombres, roles_id, email)
                values (:username, :password, :nombres, :roles_id, :email)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $usuarios->username);
        $stmt->bindParam(':password', $usuarios->password);
        $stmt->bindParam(':nombres', $usuarios->nombres);
        $stmt->bindParam(':roles_id', $usuarios->roles_id);
        $stmt->bindParam(':email', $usuarios->email);
        $stmt->execute();
        
    }
    
    public static function obtener($id) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "select id, username, password, nombres, roles_id, email
                from usuarios
         
                where id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if($objeto = $stmt->fetchObject('Usuario')){
            return $objeto;
        }
        
        return NULL;
    }
    
    public static function eliminar($id) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "delete from usuarios where id=:id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
    }
    
    public static function actualizar(Producto $producto) {
        
        $pdo = Conexion::getConexion();
        
       
            
            $sql = "update usuarios set username=:username, password=:password, nombres=:nombres, roles_id=:roles_id, email=:email
                where id=:id";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $usuarios->username);
            $stmt->bindParam(':password', $usuarios->password);
            $stmt->bindParam(':nombres', $usuarios->nombres);
            $stmt->bindParam(':roles_id', $usuarios->roles_id);
            $stmt->bindParam(':email', $usuarios->email);
            $stmt->bindParam(':id', $usuarios->id);
            $stmt->execute();
            
        
        
    }
    
}
