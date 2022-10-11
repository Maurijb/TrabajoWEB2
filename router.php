<?php
require_once './app/controllers/main.controller.php';
require_once './app/controllers/home.controller.php';
require_once './app/controllers/adm.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);


switch ($params[0]) {
    case 'login':
        $authController = new AuthController(); 
        $authController->showFormLogin();
        break;
    case 'validate':
       $authController = new AuthController(); 
       $authController->validateUser();
       break;
    case 'logout':
       $authController = new AuthController(); 
       $authController->logout();
       break;
    case 'home': 
        $mainController = new HomeController();
        $mainController->joinedView();         
        break;
    case 'add':
        $mainController = new MainController();
        $mainController->addCustomer();
        break;
    case 'delete':
        $admController = new AdmController();
        $id = $params[1];
        $admController->deleteCustomer($id);
        break;
    case 'updateCustomer':
        $admController = new AdmController();
        $id = $params[1];
        $admController->updateCustomer($id);
        break;
    case 'editCustForm':
        $admController = new AdmController();              
        $admController->editControlCust();
        break;  
    case 'customer':
        $mainController = new MainController();
        $mainController->showCus();
        break;
    case 'order': 
        $mainController = new MainController();
        if (empty($params[1])) {
            $mainController->selection();
            $mainController->showOrder();
        } else {
            $mainController->showOrder($params[1]);
        } 
        break;
    case 'addOrd':
        $mainController = new MainController();        
        $mainController->addOrder();
        break;
    case 'detail':
        $mainController = new MainController();
        $id = $params[1];      
        $mainController->showDetail($id);
        break;
    case 'deleteOrd':
        // obtengo el parametro de la acción 
        $admController = new AdmController();       
        $id = $params[1];
        $admController->deleteOrder($id);
        break; 
    case 'update':
        $admController = new AdmController();
        $id = $params[1];
        $admController->updateOrder($id);
        break; 
    case 'editForm':
        $admController = new AdmController();              
        $admController->editControl();
        break;    
    case 'send':  // finalize/:ID  
        $mainController = new MainController();      
        $id = $params[1];
        $mainController->sendOrder($id);
        break;
    case 'asigne':  
        $mainController = new MainController();      
        $id = $params[1];
        $mainController->asigneOrder($id);
        break;

    case 'filter':
        $homeController = new HomeController();
        $homeController->filter();
        break;


        default:
        echo('404 Page not found');
        break;
}
