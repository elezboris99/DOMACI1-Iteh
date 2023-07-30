<?php

require "../DBBroker.php";
require "../model/narudzba.php";

if(isset($_POST['id'])) {
    $myArray = Narudzba::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}