<?php
require "model/narudzba.php";
require "DBBroker.php";

session_start();
if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

$result = Narudzba::getAll($conn);
if (!$result) {
    echo "Greska kod upita<br>";
    die();
}
if ($result->num_rows == 0) {
    echo "Nema narudzbi";
    die();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista narudžbi</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="header">
        <h1>Lista narudžbi</h1>
    </div>
    <div id="content">
        <ul>
            <?php
            while ($red = $result->fetch_array()) {
            ?>
                <li>
                    <strong><?php echo $red["proizvod"] ?></strong>
                    <div class="order-info"><?php echo $red["id"] ?></div>
                    <div class="order-info">Kolicina: <?php echo $red["kolicina"] ?></div>
                    <div class="order-info">Mjera: <?php echo $red["mjera"] ?></div>
                    <div class="added-by">Dodao: <?php echo $red["dodao"] ?></div>
                    <label class="radio-btn">
                        <input type="radio" name="checked-donut" value="<?php echo $red["id"] ?>">
                    </label>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>



    <div class="container">
        <div class="box">
            <h4>Sakrij/Prikazi spisak</h4>
            <img src="img/prikaz.png" onclick="prikazi() " id="icon">
        </div>
        <div class="box">
            <h4>Izmeni</h4>
          <button id="btnizmeniNarudzbu" onclick="provjeriOznaku()"><img src="img/change.png" id="icon"></button>  
        </div>
        <div class="box">
            <h4>Obrisi</h4>
            <img src="img/delete.png" id="icon">
        </div>
        <div class="box">
            <h4>Dodaj novi</h4>
            <button id="dodajNarudzbu"  ><img src="img/add.png" id="icon"></button>
        </div>
    </div>

    <div class="formaNoviProizvod" id="dodajModel" style="display: none;">
        <form action="#" name="NoviProizvod" method="post" id="dodajForm">
            <div class="row">
                <div class="col-25">
                    <label for="proizvod">Naziv proizvoda:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="proizvod" name="proizvod" placeholder="Proizvod..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="kolicina">Kolicina</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kolicina" name="kolicina" placeholder="Kolicina..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="mjera">Mjera</label>
                </div>
                <div class="col-75">
                    <select id="mjera" name="mjera">
                        <option value="kilogram">KG</option>
                        <option value="komad">Komad</option>
                        <option value="litar">L</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="dodao">Dodao</label>
                </div>
                <div class="col-75">
                    <input type="text" id="dodao" name="dodao" placeholder="Korisnik..">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Potvrdi" id="btnDodaj">
            </div>
            <button type="button" id="ugasiDodavanje">Zatvori</button>
        </form>
    </div>


    <div class="formaNoviProizvod" id="izmeniModel" style="display: none;">
        <form action="#" name="IzmeniProizvod" method="post" id="izmeniForm">
        <div class="row">
                <div class="col-25">
                    <label for="ID">ID:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="idIzmena" name="idIzmena" >
                </div>
            </div>    
        <div class="row">
                <div class="col-25">
                    <label for="proizvodIzmena">Naziv proizvoda:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="proizvodIzmena" name="proizvodIzmena" placeholder="Proizvod..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="kolicinaIzmena">Kolicina</label>
                </div>
                <div class="col-75">
                    <input type="text" id="kolicinaIzmena" name="kolicinaIzmena" placeholder="Kolicina..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="mjeraIzmena">Mjera</label>
                </div>
                <div class="col-75">
                    <select id="mjeraIzmena" name="mjeraIzmena">
                        <option value="kilogram">KG</option>
                        <option value="komad">Komad</option>
                        <option value="litar">L</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="dodaoIzmena">Dodao</label>
                </div>
                <div class="col-75">
                    <input type="text" id="dodaoIzmena" name="dodaoIzmena" placeholder="Korisnik..">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Potvrdi" id="btnIzmeni">
            </div>
            <button type="button" id="ugasiIzmene">Zatvori</button>
        </form>
    </div>







    <script src="js/home.js"></script>


</body>

</html>