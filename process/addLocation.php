<?php


include '../bootstrap/init.php';

if(!isAjaxRequest()){
    diePage('Invalid request');
}

if(InsertLocation($_POST)){
    echo "مکان با موفقیت در پایگاه داده ثبت شد.";
}else{
    echo "مکان در پایگاه داده ثبت نشده است";
}
