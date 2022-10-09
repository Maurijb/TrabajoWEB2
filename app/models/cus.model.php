<?php

class CusModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_orders;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de clientes completa.
     */
    public function getAll() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM customer");
        $query->execute();

        // 3. obtengo los resultados
        $customers = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $customers;
    }

    /**
     * Inserta un cliente en la base de datos.
     */
    public function insertCustomer($company, $address, $phone, $responsible) {
        $query = $this->db->prepare("INSERT INTO customer (empresa, direccion, telefono, responsable) VALUES (?, ?, ?, ?)");
        $query->execute([$company, $address, $phone, $responsible]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina un cliente dado su id.
     */
    public function deleteCustById($id) {
        $query = $this->db->prepare('DELETE FROM customer WHERE id_cliente = ?');
        $query->execute([$id]);
    }

    //OJO CREO QUE CORRESPONDE ELILMINAR ESTE METODO QUE ESTA EN ORDERMODEL-----------------------------------------------------------------------
    
    public function finalize($id) {
        $query = $this->db->prepare('UPDATE myorder SET enviado = 1 WHERE id = ?');
        $query->execute([$id]);
        // var_dump($query->errorInfo()); // y eliminar la redireccion
    }

}
