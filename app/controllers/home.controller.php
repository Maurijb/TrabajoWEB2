<?php

require_once './app/models/join.model.php';
require_once './app/views/view.php';



class HomeController { 
    private $joinModel;
    private $view;
      
    
    public function __construct() {    
        $this->joinModel = new JoinModel();      
        $this->view = new View();
        
    }

    function joinedView(){ 
        session_start();
        $orderCustomer = $this->joinModel->getOrderCustomer();
        if ($orderCustomer != null)
        $this->view->showOrderCustomer($orderCustomer);
        else header("Location: " . BASE_URL . "order");
     } //check controla el home

     
        
    }

    