<?php

require_once './app/views/view.php';
require_once './app/models/ord.model.php';
require_once './app/models/join.model.php';
require_once './app/models/cus.model.php';
require_once './app/helpers/auth.helper.php';


class AdmController {    
    private $view;
    private $ordModel;
    private $cusModel;
    private $joinModel;
    private $authHelper;

    public function __construct() {        
        $this->view = new View();
        $this->ordModel = new OrdModel(); 
        $this->cusModel = new CusModel();
        $this->joinModel = new JoinModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();       

    } 
    
    function deleteCustomer($id) {        
        try{
            $this->cusModel->deleteCustById($id);
            header("Location: " . BASE_URL . "customer");
        } catch (Exception ) {
            $this->view->error("Accion no permitida, está intentado eliminar un cliente con pedidos asignados");       
        }        
    } // check pasa al model el cliente a borrar

    function updateCustomer($id){
        $customer = $this->cusModel->getCustomer($id);
        if($customer)
        $this->view->editCustomer($customer);
        else header("Location: " . BASE_URL . "customer");
    } // check pasa a la vista el valor a mostrar

    public function editControlCust(){
          
        if(!empty($_POST['id'])) {        
        $company = $_POST['company'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $responsible = $_POST['responsible'];
        $id = $_POST['id'];} 
       
        $this->cusModel->updateCustomer($company, $address, $phone, $responsible, $id );
        header("Location: " . BASE_URL . "customer"); 
    }    // chack pasa al model para que actualice los valores


    function deleteOrder($id) {
        try{
        $this->ordModel->deleteOrdById($id);
        header("Location: " . BASE_URL . "order" );
    } catch (Exception ) {
        $this->view->error("Error al intentar eliminar pedido");       
    }        

    }  // check pasa al model la orden a borrar

    public function updateOrder($idPar){
        $order = $this->joinModel->getOneOrder($idPar); 
        if($order)      
        $this->view->edit($order);
        else header("Location: " . BASE_URL . "order");   
    } // check pasa a la vista la orden a mostrar

    public function editControl(){ 
        if(!empty($_POST['id'])) {           
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $details = $_POST['details'];
        $id = $_POST['id'];} 
       
        $this->ordModel->update($date, $payment, $details, $id );
        header("Location: " . BASE_URL . "order"); 
    }    // chack pasa al model para que actualice los valores
   


}