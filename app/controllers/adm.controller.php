<?php

//require_once './app/views/view.php';
//require_once './app/models/ord.model.php';
//require_once './app/models/join.model.php';
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
        } catch (Exception $e) {
           echo "Accion no permitida, está intentado eliminar un cliente con pedidos asignados"; //VER COMO HACERLOS        
        }        
    } // check pasa al model el cliente a borrar

    function deleteOrder($id) {
        $this->ordModel->deleteOrdById($id);
        header("Location: " . BASE_URL . "order" );
    }  // check pasa al model la orden a borrar

    public function updateOrder($idPar){
        $ordersCustomer = $this->joinModel->getOrderCustomer();       
        $this->view->edit($idPar, $ordersCustomer);   
    } // check pasa a la vista las ordenes para que calcule cual editar (MAL debe pasar una sola)

    public function editControl(){            
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $details = $_POST['details'];
        $id = $_POST['id'];
       
        $this->ordModel->update($date, $payment, $details, $id );
        header("Location: " . BASE_URL . "order"); 
    }    // chack pasa al model para que actualice los valores
   


}