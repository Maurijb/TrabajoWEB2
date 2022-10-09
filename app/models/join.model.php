<?php

class JoinModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');
    }

        /* JOIN de Tablas ----------------------------------*/

        public function getOrderCustomer() {
            /*$db = connect();*/
            $query = $this->db->prepare("SELECT myorder.*, customer.empresa as empresa FROM myorder JOIN customer ON myorder.id_cliente = customer.id_cliente");
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

}