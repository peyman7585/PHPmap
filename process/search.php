<?php

include '../bootstrap/init.php';
usleep(500000);
if(!isAjaxRequest()){
    diePage('Invalid request');
}
$keyword=$_POST['keyword'];

if(!isset($keyword) or empty($keyword)){
    die('نتیجه جستجو یافت نشد!');
}

$locations=GetLocations(['keyword'=>$keyword]);
if(sizeof($locations)==0){
    die('نتیجه جستجو یافت نشد!');
}
foreach($locations as $loca){
    echo "<a href='".BASE_URL."?loc=$loca->id'><div class='result-item' data-lat='$loca->lat' data-lng='$loca->lng' data-loc='$loca->id'>
    <span class='loc-type'>".locationType[$loca->type]."</span>
    <span class='loc-title'>$loca->title</span>
    </div></a>";
}


                