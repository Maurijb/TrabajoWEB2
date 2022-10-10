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

function editCustomer($company){
       
        $this->smarty->assign('id', $company->id_cliente); 
        $this->smarty->assign('company', $company->empresa); 
        $this->smarty->assign('address', $company->direccion); 
        $this->smarty->assign('phone', $company->telefono);
        $this->smarty->assign('responsible', $company->responsable);
   
    $this->smarty->display('form_cusEdit.tpl');
}

function showOrders($ordersCustomer){ 
    $this->smarty->assign('ordersCustomer', $ordersCustomer);

    $this->smarty->display('orders.tpl');   
}

function edit($order){
        $this->smarty->assign('id', $order->n_pedido); 
        $this->smarty->assign('customer', $order->empresa); 
        $this->smarty->assign('payment', $order->forma_pago); 
        $this->smarty->assign('date', $order->fecha_pedido);
        $this->smarty->assign('detail', $order->detalle);
        
        $this->smarty->display('form_upd.tpl');
}

function showDetail($order){
        $this->smarty->assign('id', $order->n_pedido); 
        $this->smarty->assign('customer', $order->empresa); 
        $this->smarty->assign('payment', $order->forma_pago); 
        $this->smarty->assign('date', $order->fecha_pedido);
        $this->smarty->assign('detail', $order->detalle);
        $this->smarty->assign('id_c', $order->id_cliente); 

        $this->smarty->display('detailOrder.tpl');
}

function showFilter($filter){
    $this->smarty->assign('company', $filter->empresa);
    $this->smarty->assign('company', $filter->fecha_pago);
    $this->smarty->assign('company', $filter->forma_pago);
    $this->smarty->assign('company', $filter->detalle);

    var_dump($filter);
    $this->smarty->display('home.tpl');
}

}
