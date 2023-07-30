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

  showFormButton.addEventListener('click', function() {
      myForm.style.display = 'block'; 
  });

  const showFormButton2 = document.getElementById('ugasiDodavanje');
  const myForm2 = document.getElementById('dodajModel');
  showFormButton2.addEventListener('click', function() {
      myForm2.style.display = 'none'; 
  });



  $(document).ready(function() {
$('#btnDodaj').on('click', function() {

var proizvod = $('#proizvod').val();
var kolicina = $('#kolicina').val();
var mjera = $('#mjera').val();
var dodao = $('#dodao').val();
if(proizvod!="" && kolicina!="" && mjera!="" && dodao!=""){
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
  success: function(dataResult){
    var dataResult = JSON.parse(dataResult);
    if(dataResult.statusCode==200){
      console.log("Ubacen proizvod");
      
      
      alert("Ubacen novi proizvod na spisak!");			
    }
    else if(dataResult.statusCode==201){
      alert("Desila se greska!");
    }
    
  }
});
}
else{
  alert('Popunite sve polja !');
}
});
});

const showFormButton3 = document.getElementById('btnizmeniNarudzbu');
const myForm3 = document.getElementById('izmeniModel');

showFormButton3.addEventListener('click', function() {
  const radioGumbi = document.getElementsByName("checked-donut");

  for (let i = 0; i < radioGumbi.length; i++) {
    if (radioGumbi[i].checked) {
   myForm3.style.display = 'block'; 
  break;
    }
  }
  if(myForm3.style.display !='block'){
  alert("Nije cekirana stavka za izmenu");
}
});

const showFormButton4 = document.getElementById('ugasiIzmene');
const myForm4 = document.getElementById('izmeniModel');
showFormButton4.addEventListener('click', function() {
    myForm4.style.display = 'none'; 
});
const polje = document.getElementById("idIzmena");

polje.addEventListener("keydown", function(event) {
  event.preventDefault();
});
var idZaIzmenu;
function provjeriOznaku() {
  const radioGumbi = document.getElementsByName("checked-donut");

  for (let i = 0; i < radioGumbi.length; i++) {
    if (radioGumbi[i].checked) {
      document.getElementById("idIzmena").value=radioGumbi[i].value;
      console.log(radioGumbi[i].value);
      idZaIzmenu=radioGumbi[i].value;
    }
  }
}
