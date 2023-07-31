function prikazi() {
  var x = document.getElementById("content");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

const showFormButton = document.getElementById('dodajNarudzbu');
const myForm = document.getElementById('dodajModel');

showFormButton.addEventListener('click', function () {
  myForm.style.display = 'block';
});

const showFormButton2 = document.getElementById('ugasiDodavanje');
const myForm2 = document.getElementById('dodajModel');
showFormButton2.addEventListener('click', function () {
  myForm2.style.display = 'none';
});



$(document).ready(function () {
  $('#btnDodaj').on('click', function () {

    var proizvod = $('#proizvod').val();
    var kolicina = $('#kolicina').val();
    var mjera = $('#mjera').val();
    var dodao = $('#dodao').val();
    if (proizvod != "" && kolicina != "" && mjera != "" && dodao != "") {
      $.ajax({
        url: "handler/add.php",
        type: "POST",
        data: {
          proizvod: proizvod,
          kolicina: kolicina,
          mjera: mjera,
          dodao: dodao
        },
        cache: false,
        success: function (dataResult) {
          if (dataResult == "Success") {
            console.log("Ubacen proizvod");


            alert("Ubacen novi proizvod na spisak!");
          }
          else if (dataResult.statusCode == 201) {
            alert("Desila se greska!");
          }

        }
      });
    }
    else {
      alert('Popunite sve polja !');
    }
  });
});

const showFormButton3 = document.getElementById('btnizmeniNarudzbu');
const myForm3 = document.getElementById('izmeniModel');
var idZaIzmenu;
showFormButton3.addEventListener('click', function () {
  const radioDugme = document.getElementsByName("checked-donut");

  for (let i = 0; i < radioDugme.length; i++) {
    if (radioDugme[i].checked) {
      document.getElementById("idIzmena").value = radioDugme[i].value;
      console.log(radioDugme[i].value);
      idZaIzmenu = radioDugme[i].value;
      myForm3.style.display = 'block';
      break;
    }
  }
  if (myForm3.style.display != 'block') {
    alert("Nije cekirana stavka za izmenu");
  }
});

const showFormButton4 = document.getElementById('ugasiIzmene');
const myForm4 = document.getElementById('izmeniModel');
showFormButton4.addEventListener('click', function () {
  myForm4.style.display = 'none';
});
const polje = document.getElementById("idIzmena");

polje.addEventListener("keydown", function (event) {
  event.preventDefault();
});

$(document).ready(function () {
  $('#btnIzmeni').on('click', function () {
    var proizvod = $('#proizvodIzmena').val();
    var kolicina = $('#kolicinaIzmena').val();
    var mjera = $('#mjeraIzmena').val();
    var dodao = $('#dodaoIzmena').val();
    var id = idZaIzmenu;
    if (id != "" && proizvod != "" && kolicina != "" && mjera != "" && dodao != "") {
      console.log(idZaIzmenu);
      console.log(proizvod);
      console.log(kolicina);
      console.log(mjera);
      console.log(dodao);

      $.ajax({
        url: "handler/update.php",
        type: "POST",
        data: {
          id: id,
          proizvod: proizvod,
          kolicina: kolicina,
          mjera: mjera,
          dodao: dodao
        },
        cache: false,
        success: function (dataResult) {
          if (dataResult == "Success") {
            console.log("Ubacen proizvod");


            alert("Ubacen novi proizvod na spisak!");
          }
          else if (dataResult.statusCode == 201) {
            alert("Desila se greska!");
          }

        }
      });
    }
    else {
      alert('Popunite sve polja !');
    }

  });
});
var idZaBrisanje=-1;
function obrisiStavku() {
  const radioDugme = document.getElementsByName("checked-donut");
  var testDugme = 0;
  for (let i = 0; i < radioDugme.length; i++) {
    if (radioDugme[i].checked) {
      console.log(radioDugme[i].value);
idZaBrisanje=radioDugme[i].value;
      testDugme = 1;
     
    }

  }
  if (testDugme == 0) {
    alert("Nije izabrana stavka za brisanje!")
  }
}


$(document).ready(function () {
  $('#btnObrisiNarudzbu').on('click', function () {
    var id = idZaBrisanje;
    if(id!=-1){
  
      console.log(id);
      $.ajax({
        url: "handler/delete.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function (dataResult) {
          
          if (dataResult == "Success") {
            console.log("Obrisan proizvod");
            alert("Obrisan proizvod sa spiska!");
            location.reload();
          }
          else if (dataResult.statusCode == 201) {
            alert("Desila se greska!");
          }

        }
      });
    }
  

  });
});