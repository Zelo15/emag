<?php

define("baseDIR",dirname(__FILE__));

if (isset($_GET["page"])){
    $get = $_GET["page"];
}else{
    die("Kernel not working");
}

initialize($get);

function initialize($pageFullPath){
    $fragments=explode("/",$pageFullPath);

    if (empty($fragments[0])){
        $fragments[0] = "index";
    }
    $method = null;
    $controllerFullPath = "Controllers/".$fragments[0]."Controller.php";
    //echo $controllerFullPath;
    
        $controllerName = $fragments[0]."Controller";
        //echo count($fragments);
        switch (count($fragments)) {
            case 1:
                if (file_exists(baseDIR."/Views/".$fragments[0].".php")){
                    require_once baseDIR."/Views/".$fragments[0].".php";
                }else{
                    require_once "Views/404.php";
                }
                break; 
            case 2:
                if (file_exists($controllerFullPath)){
                    require_once($controllerFullPath);
                    $controller = new $controllerName();
                    $method = $fragments[1];
                    $controller->{$method}();

                }else{
                    require_once "Views/404.php";
                }
                break;
            case 3:
            if (file_exists($controllerFullPath)){
                    require_once($controllerFullPath);
                    $controller = new $controllerName();
                    $method = $fragments[1];
                    $controller->{$method}($fragments[2]);
                }else{
                    require_once "Views/404.php";
                }
                break;
            default:
                require_once "Views/404.php";
        }
    
}