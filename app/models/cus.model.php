<?php

class CusModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM customer");
        $query->execute();
        $customers = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $customers;
    }

    function getCustomer($id){
        $query = $this->db->prepare("SELECT * FROM customer WHERE id_cliente =?");
        $query->execute([$id]);

        $customer = $query->fetch(PDO::FETCH_OBJ);
        
        return $customer;
    }

    public function insertCustomer($company, $address, $phone, $responsible) {
        $query = $this->db->prepare("INSERT INTO customer (empresa, direccion, telefono, responsable) VALUES (?, ?, ?, ?)");
        $query->execute([$company, $address, $phone, $responsible]);

        return $this->db->lastInsertId();
    }

    public function deleteCustById($id) {
        $query = $this->db->prepare('DELETE FROM customer WHERE id_cliente = ?');
        $query->execute([$id]);
    }

    public function updateCustomer($company, $address, $phone, $responsible, $id ) {        
        $query = $this->db->prepare("UPDATE customer SET  empresa=?, direccion=?, telefono=?, responsable=? WHERE id_cliente=?");
        $query->execute([$company, $address, $phone, $responsible, $id]);
    }


}
