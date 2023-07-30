<?php

require "../DBBroker.php";
require "../model/narudzba.php";

if (isset($_POST['id']) && isset($_POST['proizvod']) && isset($_POST['kolicina'])
    && isset($_POST['mjera']) && isset($_POST['dodao'])) {

    $status = Narudzba::update($_POST['id'], $_POST['proizvod'], $_POST['kolicina'], $_POST['mjera'], $_POST['dodao'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo 'Failed';
    }
}
