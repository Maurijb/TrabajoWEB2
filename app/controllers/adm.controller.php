<?php

require_once './app/views/view.php';
require_once './app/models/ord.model.php';

require_once './app/helpers/auth.helper.php';


class AdmController {
    
    private $view;
    private $ordModel;
    private $cusModel;
   

    public function __construct() {        
        $this->view = new View();
        $this->ordModel = new OrdModel(); 
        $this->cusModel = new CusModel();

        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
       

    } 
    
    function deleteCustomer($id) {
        try{
            $this->cusModel->deleteCustById($id);
            header("Location: " . BASE_URL . "customer");
        } catch (Exception $e) {
           echo "Accion no permitida, está intentado eliminar un cliente con pedidos asignados"; //VER COMO HACERLOS        
        }
        
    }

    function deleteOrder($id) {
        $this->ordModel->deleteOrdById($id);
        header("Location: " . BASE_URL . "order" );
    }  

    public function updateOrder($idPar){
        $ordersCustomer = $this->ordModel->getOrderCustomer();       
        $this->view->edit($idPar, $ordersCustomer);   
    }

    public function editForm($date, $payment, $detail, $id){
        $this->ordModel->update($date, $payment, $detail, $id);
        header("Location: " . BASE_URL . "order" );
    }

    public function editControl(){
            
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $details = $_POST['details'];
        $id = $_POST['id'];
       
        $this->ordModel->update($date, $payment, $details, $id );

        header("Location: " . BASE_URL . "order"); 
    }    
   


}