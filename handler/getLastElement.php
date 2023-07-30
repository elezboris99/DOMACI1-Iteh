<?php
require "../DBBroker.php";
require "../model/narudzba.php";


$status = Narudzba::getLast($conn);
if ($status) {
    echo $status->fetch_column();
} else {
    echo $status;
    echo 'Failed';
}