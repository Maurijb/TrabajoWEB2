<?php

class OrdModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');
    }
   
    public function getAll() {        
        $query = $this->db->prepare("SELECT * FROM myorder");
        $query->execute();
        $orders = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $orders;
    }

    public function insertOrder($company2, $date, $payment, $details) {
        $query = $this->db->prepare("INSERT INTO myorder (id_cliente, fecha_pedido, forma_pago, detalle, enviado) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$company2, $date, $payment, $details, 0]);

        return $this->db->lastInsertId();
    }

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
    }
    public function asigne($id) {
        $query = $this->db->prepare('UPDATE myorder SET enviado = 0 WHERE n_pedido = ?');
        $query->execute([$id]);
    }


 



}
