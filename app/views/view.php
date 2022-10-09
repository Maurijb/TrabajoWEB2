<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class View {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    
}

function showCustomers($customers) {
   
    $this->smarty->assign('count', count($customers)); 
    $this->smarty->assign('customers', $customers);

    $this->smarty->display('customers.tpl');  

}

function selections($orders, $customers){    

    $this->smarty->assign('orders', $orders);
    $this->smarty->assign('customers', $customers); 
   
 }



/* JOIN View ----------------------------------*/

function showOrderCustomer($orderCustomer){
    $title= 'Listado de Ordenes Solicitadas';
   $this->smarty->assign('title', $title);
   
   $this->smarty->assign('orderCustomer', $orderCustomer); 
   

   $subtitle = 'Enviadas';
   $send = array();
    foreach ($orderCustomer as $order){
        if ($order->enviado==1){
        array_push($send, $order);
    }
    $this->smarty->assign('send', $send);
    $this->smarty->assign('subtitle', $subtitle);
    }   
    $this->smarty->display('home.tpl');   

}

function showDetail($idPar, $ordersCustomer){
  
    $this->smarty->assign('idPar', $idPar);
    $this->smarty->assign('ordersCustomer', $ordersCustomer);
    foreach ($ordersCustomer as $ord)
            if ($ord->id_cliente==$idPar){
                $this->smarty->assign('empresa', $ord->empresa); 
                $this->smarty->assign('pedido', $ord->detalle); 
            }                                 
    $this->smarty->display('detailOrder.tpl');
}

function showOrders($ordersCustomer){   
    
   $this->smarty->assign('ordersCustomer', $ordersCustomer);

   $this->smarty->display('orders.tpl');
}

function edit($idPar, $ordersCustomer){

    foreach ($ordersCustomer as $ord)
           if ($ord->n_pedido==$idPar){
                $this->smarty->assign('id', $ord->n_pedido); 
                $this->smarty->assign('customer', $ord->empresa); 
                $this->smarty->assign('payment', $ord->forma_pago); 
                $this->smarty->assign('date', $ord->fecha_pedido);
                $this->smarty->assign('detail', $ord->detalle);} 
                
                
                                      
    $this->smarty->display('form_upd.tpl');
}

}
