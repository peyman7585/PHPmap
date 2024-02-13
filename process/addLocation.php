<?php


include '../bootstrap/init.php';

if(!isAjaxRequest()){
    diePage('Invalid request');
}

var_dump($_POST);