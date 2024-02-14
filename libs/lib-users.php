<?php

function isLoggedin(){
    return isset($_SESSION['login']);
}

function loggin($username,$password){
    global $admins;

    if(array_key_exists($username,$admins) &&
    $admins[$username] == $password)
    {
     $_SESSION['login']=1;
     return true;
    }
    return false;
}

function logOut(){
    unset($_SESSION['login']);
}