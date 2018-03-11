<?php
class ProductosDAO {
    
    public static function listar() {
        
        $con = Conexion::getConexion();
        
        $sql = "select p.id, p.categorias_id, c.nombre as categorias_nombre, p.nombre, precio, stock, imagen_nombre, creado, estado
                from productos p
                inner join categorias c on c.id=p.categorias_id
                order by creado desc";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();
        
        $lista = [];
        while($registro = $stmt->fetchObject('Producto')){
            $lista[] = $registro;
        }
        
        return $lista;
    }
    
    public static function listarPorCategoria($id) {
        
        $con = Conexion::getConexion();
        
        $sql = "select p.id, p.categorias_id, c.nombre as categorias_nombre, p.nombre, precio, stock, imagen_nombre, creado, estado
                from productos p
                inner join categorias c on c.id=p.categorias_id
                where p.categorias_id = :categorias_id
                order by creado desc";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':categorias_id', $id);
        $stmt->execute();
        
        $lista = [];
        while($registro = $stmt->fetchObject('Producto')){
            $lista[] = $registro;
        }
        
        return $lista;
    }
    
    public static function registrar($producto) {
        
        $con = Conexion::getConexion();
        
        $sql = "insert into productos (categorias_id, nombre, descripcion, precio, stock, estado, imagen_nombre, imagen_tipo, imagen_tamanio)
                values (:categorias_id, :nombre, :descripcion, :precio, :stock, :estado, :imagen_nombre, :imagen_tipo, :imagen_tamanio)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':categorias_id', $producto->categorias_id);
        $stmt->bindParam(':nombre', $producto->nombre);
        $stmt->bindParam(':descripcion', $producto->descripcion);
        $stmt->bindParam(':precio', $producto->precio);
        $stmt->bindParam(':stock', $producto->stock);
        $stmt->bindParam(':estado', $producto->estado);
        $stmt->bindParam(':imagen_nombre', $producto->imagen_nombre);
        $stmt->bindParam(':imagen_tipo', $producto->imagen_tipo);
        $stmt->bindParam(':imagen_tamanio', $producto->imagen_tamanio);
        $stmt->execute();
        
    }
    
    public static function obtener($id) {
        
        $con = Conexion::getConexion();
        
        $sql = "select p.id, p.categorias_id, c.nombre as categorias_nombre, p.nombre, p.descripcion, precio, stock, imagen_nombre, imagen_tamanio, imagen_tipo, creado, estado
                from productos p
                inner join categorias c on c.id=p.categorias_id
                where p.id = :id
                order by creado desc";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        if($registro = $stmt->fetchObject('Producto')){
            return $registro;
        }
        
        return NULL;
    }
    
    public static function actualizar($producto) {
        
        if(isset($producto->imagen_nombre)){
            
            $sql = "update productos set categorias_id=:categorias_id, nombre=:nombre, descripcion=:descripcion, 
                   precio=:precio, stock=:stock, imagen_nombre=:imagen_nombre, imagen_tipo=:imagen_tipo, imagen_tamanio=:imagen_tamanio, estado=:estado 
                   where id = :id";
            
            $pdo = Conexion::getConexion();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':categorias_id', $producto->categorias_id);
            $stmt->bindParam(':nombre', $producto->nombre);
            $stmt->bindParam(':descripcion', $producto->descripcion);
            $stmt->bindParam(':precio', $producto->precio);
            $stmt->bindParam(':stock', $producto->stock);
            $stmt->bindParam(':imagen_nombre', $producto->imagen_nombre);
            $stmt->bindParam(':imagen_tipo', $producto->imagen_tipo);
            $stmt->bindParam(':imagen_tamanio', $producto->imagen_tamanio);
            $stmt->bindParam(':estado', $producto->estado);
            $stmt->bindParam(':id', $producto->id);
            $stmt->execute();
            
        }else{
            
            $sql = "update productos set categorias_id=:categorias_id, nombre=:nombre, descripcion=:descripcion, 
                   precio=:precio, stock=:stock, estado=:estado 
                   where id = :id";
            
            $pdo = Conexion::getConexion();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':categorias_id', $producto->categorias_id);
            $stmt->bindParam(':nombre', $producto->nombre);
            $stmt->bindParam(':descripcion', $producto->descripcion);
            $stmt->bindParam(':precio', $producto->precio);
            $stmt->bindParam(':stock', $producto->stock);
            $stmt->bindParam(':estado', $producto->estado);
            $stmt->bindParam(':id', $producto->id);
            $stmt->execute();
            
        }
        
    }
    
    public static function cambiarEstado($id, $estado) {
        
        $con = Conexion::getConexion();
        
        $sql = "update productos set estado=:estado where id = :id";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
        
    }
    
    public static function eliminar($id) {
        
        $con = Conexion::getConexion();
        
        $sql = "delete from productos where id = :id";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
    }
    
}


