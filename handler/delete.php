<?php
require "../DBBroker.php";
require  "../model/narudzba.php";

if(isset($_POST['id'])){
    
    $status = Narudzba::deleteById($_POST['id'], $conn);
    if($status){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}