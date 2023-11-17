<?php
    class Productos extends Conectar{
        public function get_productos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM productos ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function get_productos_x_Codigo($Codigo_Pro){
            $conectar = parent::conexion();
            parent::set_names();
    
            $sql = "SELECT * FROM productos WHERE Codigo_Pro = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $Codigo_Pro);
            $stmt->execute();
    
            return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function insert_productos($Nombre, $Precio, $Cantidad, $Fecha_Ven){
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "INSERT INTO productos(Codigo_Pro, Nombre, Precio, Cantidad, Fecha_Ven) VALUES (NULL, ?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $Nombre);
            $sql->bindParam(2, $Precio);
            $sql->bindParam(3, $Cantidad);
            $sql->bindParam(4, $Fecha_Ven);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        public function update_productos($Codigo_Pro, $Nombre, $Precio, $Cantidad, $Fecha_Ven){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET Nombre = ?, Precio = ?, Cantidad = ?, Fecha_Ven = ? WHERE Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Codigo_Pro);
            $sql->bindParam(2, $Nombre);
            $sql->bindParam(3, $Precio);
            $sql->bindParam(4, $Cantidad);
            $sql->bindParam(5, $Fecha_Ven);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        


        public function delete_productos($Codigo_Pro){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET
            Cantidad = ? 
            WHERE Codigo_Pro = ?";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
            
        }
        
    
?>