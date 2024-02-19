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
        $condition="WHERE verfied={$params['verfied']}";

    }elseif($params['keyword']){
        $condition="WHERE verfied = 1 and title LIKE '%{$params['keyword']}%'";
    }

     $sql="SELECT * FROM `locations` $condition";
     $stmt=$pdo->prepare($sql);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function LM_location($id){
    global $pdo;
    $sql="SELECT * FROM `locations` where id =:id ";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function ToggleStatus($id){
    global $pdo;
    $sql=" UPDATE `locations` SET verfied = 1 - verfied WHERE id = :id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    return $stmt->rowCount();
}