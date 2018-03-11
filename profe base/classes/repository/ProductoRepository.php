<?php
class ProductoRepository {
    
    public static function listar() {
        
        $pdo = Conexion::getConexion();
        
        $sql = "select p.id, p.categorias_id, c.nombre as categorias_nombre, p.nombre, precio, stock, imagen_nombre, creado, estado
                from productos p
                inner join categorias c on c.id=p.categorias_id
                order by creado desc";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $lista = [];
        while($objeto = $stmt->fetchObject('Producto')){
            $lista[] = $objeto;
        }
        
        return $lista;
    }
    
}
