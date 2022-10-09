<?php

class OrdModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de ordenes completa.
     */
    public function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM myorder");
        $query->execute();

        // 3. obtengo los resultados
        $orders = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $orders;
    }

    /**
     * Inserta una orden en la base de datos.
     */
    public function insertOrder($company2, $date, $payment, $details) {
        $query = $this->db->prepare("INSERT INTO myorder (id_cliente, fecha_pedido, forma_pago, detalle, enviado) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$company2, $date, $payment, $details, 0]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina una orden dado su id.
     */
    public function deleteOrdById($id) {
        $query = $this->db->prepare('DELETE FROM myorder WHERE n_pedido = ?');
        $query->execute([$id]);
    }
    
    public function update($date, $payment, $detail, $id ) {
        
        $query = $this->db->prepare("UPDATE myorder SET  fecha_pedido=?, forma_pago=?, detalle=? WHERE n_pedido=?");
        $query->execute([$date, $payment, $detail, $id]);
       

    }

    public function send($id) {
        $query = $this->db->prepare('UPDATE myorder SET enviado = 1 WHERE n_pedido = ?');
        $query->execute([$id]);
        // var_dump($query->errorInfo()); // y eliminar la redireccion
    }
    public function asigne($id) {
        $query = $this->db->prepare('UPDATE myorder SET enviado = 0 WHERE n_pedido = ?');
        $query->execute([$id]);
        // var_dump($query->errorInfo()); // y eliminar la redireccion
    }


    /* JOIN de Tablas ----------------------------------*/

    public function getOrderCustomer() {
        /*$db = connect();*/
        $query = $this->db->prepare("SELECT myorder.*, customer.empresa as empresa FROM myorder JOIN customer ON myorder.id_cliente = customer.id_cliente");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }




}
