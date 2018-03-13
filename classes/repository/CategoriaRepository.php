<?php
class CategoriaRepository {
    
    public static function listar() {
        
        // Obtener la conexion
        $pdo = Conexion::getConexion();
        
        // Crear el Statement
        $sql = "select * from categorias order by nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $lista = [];
        while($objeto = $stmt->fetchObject('Categoria')){
            $lista[] = $objeto;
        }
        
        return $lista;
    }
    
   public static function registrar(Categoria $categoria) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "insert into categorias ( nombre, orden)
                values ( :nombre, :orden)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $categoria->nombre);
        $stmt->bindParam(':orden', $categoria->orden);
        $stmt->execute();
        
    }
    
     public static function obtener($id) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "select  c.id, c.nombre, c.orden
                from categorias c
                where c.id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if($objeto = $stmt->fetchObject('Categoria')){
            return $objeto;
        }
        
        return NULL;
    }
    public static function eliminar($id) {
        
        $pdo = Conexion::getConexion();
        
        $sql = "delete from categorias where id=:id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
    }
    
    public static function actualizar(Categoria $categoria) {
        
        $pdo = Conexion::getConexion();
        
        
            
            $sql = "update categorias set nombre=:nombre, orden=:orden where id=:id";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $categoria->nombre);
            $stmt->bindParam(':orden', $categoria->orden);
            $stmt->bindParam(':id', $categoria->id);
            $stmt->execute();
            
        
        
    }
    
}