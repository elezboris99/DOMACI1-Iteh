<?php 

class Narudzba{
public $id;
public $proizvod;
public $kolicina;
public $mjera;
public $dodao;

public function __construct($id = null, $proizvod=null, $kolicina=null, $mjera=null,$dodao=null )
{
    $this->id=$id;
    $this->proizvod=$proizvod;
    $this->kolicina=$kolicina;
    $this->mjera=$mjera;
    $this->dodao=$dodao;
}

public static function getAll(mysqli $conn)
{
    $q = "SELECT * FROM narudzbe";
    return $conn->query($q);
}
public static function deleteById($id, mysqli $conn)
{
    $q = "DELETE FROM narudzbe WHERE id=$id";
    return $conn->query($q);
}
public static function add($proizvod, $kolicina, $mjera, $dodao, mysqli $conn)
{

    $q = "INSERT INTO narudzbe(proizvod, kolicina, mjera, dodao) values('$proizvod', '$kolicina', '$mjera',  '$dodao')";
    return $conn->query($q);
}

public static function update($id, $proizvod, $kolicina, $mjera, $dodao, mysqli $conn)
{
    $q = "UPDATE narudzbe set proizvod='$proizvod', kolicina='$kolicina', mjera='$mjera', dodao='$dodao' where id=$id";
    return $conn->query($q);
}

public static function getById($id, mysqli $conn)
{
    $q = "SELECT * FROM narudzbe WHERE id=$id";
    $myArray = array();
    if ($result = $conn->query($q)) {

        while ($row = $result->fetch_array(1)) {
            $myArray[] = $row;
        }
    }
    return $myArray;
}

public static function getLast(mysqli $conn)
{
    $q = "SELECT * FROM narudzbe ORDER BY id DESC LIMIT 1";
    return $conn->query($q);
}

}

?>