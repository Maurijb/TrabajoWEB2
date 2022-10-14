<?php

require_once './app/models/join.model.php';
require_once './app/views/view.php';



class HomeController { 
    private $joinModel;
    private $cusModel;
    private $view;
      
    
    public function __construct() {    
        $this->joinModel = new JoinModel(); 
        $this->cusModel = new CusModel();     
        $this->view = new View();
        
    }

    function joinedView(){ 
        session_start();
        $customers=$this->cusModel->getAll();
        $orderCustomer = $this->joinModel->getOrderCustomer();
        if ($orderCustomer != null)
        $this->view->showOrderCustomer($orderCustomer, $customers);
        else header("Location: " . BASE_URL . "order");
     } //check controla el home

     function filter(){
        session_start();
        $customers=$this->cusModel->getAll();
        $filter = $_POST['company2'];
        if ($filter == "")
        $orderCustomer = $this->joinModel->getOrderCustomer();
        else 
        $orderCustomer = $this->joinModel->getOrderCustomerByCompany($filter);
        if ($orderCustomer != null)
        $this->view->showOrderCustomer($orderCustomer, $customers);
        else header("Location: " . BASE_URL . "order");
     } //check controla el home con filtro

     }
        
    

    