<?php

function InsertLocation($data){
    global $pdo;

    $sql="INSERT INTO `locations` (`title`, `lat`, `lng`, `type`) VALUES (:title, :lat, :lng, :typ)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':typ'=>$data['type'],]);

    return $stmt->rowCount();
}

function GetLocations($params=[]){
     global $pdo;
     $condition='';   
    if(isset($params['verfied']) and in_array($params['verfied'],['0','1'])){
        $condition="where verfied={$params['verfied']}";
    }

     $sql="SELECT * FROM `locations` $condition";
     $stmt=$pdo->prepare($sql);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_OBJ);
}