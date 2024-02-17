<?php
include "bootstrap/init.php";

if(isset($_GET['logout']) && $_GET['logout'] ==1 ){
    logOut();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!loggin($_POST['username'],$_POST['password'])){
        echo message("نام یا کلمه عبور اشتباه است.");
    }

}

if(isLoggedin()){
    $params=$_GET ?? [];
    $getlocation=GetLocations($params);
   
    include "template/tpl-admin.php";
}else{
    include "template/tpl-admin-auth.php";  
}

