<?php
require_once './app/models/cus.model.php';
require_once './app/models/ord.model.php';
require_once './app/views/view.php';
require_once './app/helpers/auth.helper.php';


class MainController {
    private $cusModel;
    private $view;
    private $ordModel;
    private $authHelper;

    public function __construct() {
        $this->cusModel = new CusModel();        
        $this->view = new View();
        $this->ordModel = new OrdModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        
    }

    public function showCus() {                     
        $customers = $this->cusModel->getAll();        
        $this->view->showCustomers($customers);
    }

    
    function addCustomer() {
        //validar entrada de datos

        $company = $_POST['company'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $responsible = $_POST['responsible'];

        $id = $this->cusModel->insertCustomer($company, $address, $phone, $responsible);

        header("Location: " . BASE_URL . "customer"); 
    }  

    public function selection(){
        $orders = $this->ordModel->getAll();
        $customers = $this->cusModel->getAll();
        $this->view->selections($orders, $customers);        
    }  

    function addOrder() {
        //validar entrada de datos
        $company2 = $_POST['company2'];
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $details = $_POST['details'];

        $id = $this->ordModel->insertOrder($company2, $date, $payment, $details);

        header("Location: " . BASE_URL . "order"); 
    }

    function sendOrder($id) {
        $this->ordModel->send($id);
        header("Location: " . BASE_URL . "order"); 
    }
    function asigneOrder($id) {
        $this->ordModel->asigne($id);
        header("Location: " . BASE_URL . "order"); 
    }

    function joinedView(){
        
       $orderCustomer = $this->ordModel->getOrderCustomer();
       if ($orderCustomer != null)
       $this->view->showOrderCustomer($orderCustomer);
       else header("Location: " . BASE_URL . "order");
    }

    public function showOrder($idPar = null){
        $ordersCustomer = $this->ordModel->getOrderCustomer();
       
        $this->view->showOrders($ordersCustomer);
        if (!$idPar == null) $this->view->showDetail($idPar, $ordersCustomer);
        
    }


}
