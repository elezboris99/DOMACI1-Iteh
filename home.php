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
</head>

<body>

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
                    <div class="order-info"><?php echo $red["kolicina"] ?></div>
                    <div class="order-info"><?php echo $red["mjera"] ?></div>
                    <div class="added-by"><?php echo $red["dodao"] ?></div>
                    <label class="radio-btn">
                        <input type="radio" name="checked-donut" value="obiljezen">
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
            <img src="img/change.png" id="icon">
        </div>
        <div class="box">
            <h4>Obrisi</h4>
            <img src="img/delete.png" id="icon">
        </div>
        <div class="box">
            <h4>Dodaj novi</h4>
           <button id="dodajNarudzbu"><img src="img/add.png" id="icon"></button> 
        </div>
    </div>

    <div class="formaNoviProizvod" id="dodajModel" style="display: none;">
        <form action="action_page.php">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Naziv proizvoda:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Proizvod..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Kolicina</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="Kolicina..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">Mjera</label>
                </div>
                <div class="col-75">
                    <select id="country" name="country">
                        <option value="kilogram">KG</option>
                        <option value="komad">Komad</option>
                        <option value="litar">L</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Dodao</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="Korisnik..">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Potvrdi">
            </div>
            <button type="button" id="ugasiDodavanje">Zatvori</button>
        </form>
    </div>







    <script src="js/home.js"></script>
<script>  const showFormButton = document.getElementById('dodajNarudzbu');
  const myForm = document.getElementById('dodajModel');

  showFormButton.addEventListener('click', function() {
    myForm.style.display = 'block'; // Prikaži formu kada je gumb kliknut
  });
  
  const showFormButton2 = document.getElementById('ugasiDodavanje');
  const myForm2 = document.getElementById('dodajModel');
  showFormButton2.addEventListener('click', function() {
    myForm2.style.display = 'none'; // Prikaži formu kada je gumb kliknut
  });
  
  
  
  </script>

</body>

</html>