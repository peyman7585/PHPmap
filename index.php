<?php

include "bootstrap/init.php";

$loca=false;
if(isset($_GET['loc']) and is_numeric($_GET['loc'])){
    $loca=LM_location($_GET['loc']);
}

include "template/tpl-index.php";