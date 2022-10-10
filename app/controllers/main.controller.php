<?php
require_once './app/models/cus.model.php';
require_once './app/models/ord.model.php';
require_once './app/models/join.model.php';
require_once './app/views/view.php';
require_once './app/helpers/auth.helper.php';


class MainController {
    private $cusModel;
    private $joinModel;
    private $view;
    private $ordModel;
    private $authHelper;

    public function __construct() {
        $this->cusModel = new CusModel(); 
        $this->joinModel = new JoinModel();      
        $this->view = new View();
        $this->ordModel = new OrdModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
        
    }

    function addCustomer() {
        $company = $_POST['company'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $responsible = $_POST['responsible'];

        $id = $this->cusModel->insertCustomer($company, $address, $phone, $responsible);
        header("Location: " . BASE_URL . "customer"); 
    } //check controla el agregado de clientes desde el form

    public function showCus() {                     
        $customers = $this->cusModel->getAll();        
        $this->view->showCustomers($customers);
    } // check pasamano para mostrar clientes 

    public function selection(){
        $orders = $this->ordModel->getAll();
        $customers = $this->cusModel->getAll();
        $this->view->selections($orders, $customers);        
    }  // check pasamano para mostrar select>options de clientes->empresa 

    public function showOrder($idPar = null){
        $ordersCustomer = $this->joinModel->getOrderCustomer();        
        $this->view->showOrders($ordersCustomer);
        if (!$idPar == null) $this->view->showDetail($idPar, $ordersCustomer);        
    } // check controla tabla de pedidos x cliente (join)

    function addOrder() {
        $company2 = $_POST['company2'];
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $details = $_POST['details'];

        $id = $this->ordModel->insertOrder($company2, $date, $payment, $details);
        header("Location: " . BASE_URL . "order"); 
    } //check controla el agregado de ordenes desde el form

    function sendOrder($id) {
        $this->ordModel->send($id);
        header("Location: " . BASE_URL . "order"); 
    } //check manda al model la orden a setear "1" enviado

    function asigneOrder($id) {
        $this->ordModel->asigne($id);
        header("Location: " . BASE_URL . "order"); 
    } //check manda al model la orden a setear "0" no enviado

    function showDetail($id){
        $order = $this->joinModel->getOneOrder($id);
        $this->view->showDetail($order);
    } //check manda la orden a ver en detalle

    function filter($id){
        $filter = $this->joinModel->getOrderFilter($id);
        $this->view->showFilter($filter);
    }










    

   


}
