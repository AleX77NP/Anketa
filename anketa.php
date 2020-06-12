<?php

session_start();
if(empty($_SESSION['imeprezime']))
{
  header("Location: index.php");
  exit();
}


if(isset($_GET['dalje']))
{

  if(empty($_GET['nultopitanje']) || strlen($_GET['nultopitanje']) < '25' || 
  !preg_match('/^[a-zA-Z0-9,.!?čćČĆ ]*$/', $_GET['nultopitanje']))
  {
    header("Location: home.php");
    exit();
  }

  $pitanje_odg = $_GET['nultopitanje'];
  $_SESSION['nulto'] = $pitanje_odg;

}

?>

<!DOCTYPE html>
<head>
<title>Anketa</title>
<style>

* {
  margin:0;
  padding:0;
  font-family: Tahoma;
  box-sizing:border-box;
  -o-box-sizing:border-box;
  -ms-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box;
}

body {
    background-image: url("pozadina4.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center center;
}

.forma-ankete {
  width: 65%;
  max-width: 60%;
  border-radius: 20px;
  margin: auto;
  background: rgba(0,0,0,0.8);
  box-sizing: border-box;
  padding: 40px;
  color: #fff;
  margin-top: 50px;
}

h1 {
    text-align :center;
    font-size: 300%;
    margin-bottom: 3%;
}
h3 {
    text-align :center;
    color: #F0FFFF;
}
.school {
    margin-bottom: 2%;
    color:white;
    background-color: #483D8B;
    font-size: 100%;
    max-width: 95%;
    font-weight: bold;
}
.school2 {
    margin-bottom: 2%;
    color:blue;
    background-color: #FFA500;
    font-size: 100%;
    max-width: 95%;
    font-weight: bold;
}
.polje {
    width: 30%;
    margin-bottom: 2%;
    max-width: 95%;
    background-color: #32CD32;
    color: #F0FFFF;
    font-weight: bold;
    font-size: 130%;
}

.kdugme {
background-color:red;
color: #F0FFFF;
width: 15%;
font-size: 110%;
margin-top: 1.3%;
max-width: 20%;
min-width: 20%;
}

nav ul li a {
  color: #FFF;
  text-decoration: none;
}

nav ul {
  background-color: rgba(0,0,0,0.5);
}
nav ul > li {
  padding: 15px;
  display: inline-block;
  transition: all .3s ease;
  margin-left: -5px
}
nav ul > li:not(:last-of-type):hover {
  background-color: #222
}
/*nav ul > li:first-of-type {
  background-color: #222
} */
nav ul > li:last-of-type {
  float: right;
}
nav ul > li:last-of-type a .fa {
  font-size: 21px
}
nav ul > li:last-of-type {
  position: relative;
  display: none
}
nav ul > ol {
  position: absolute;
  top: 49px;
  right: 0;
  background: #333;
  text-align: center;
  list-style: none;
  display: none
}
nav ul > ol > li {
  width: 100vw;
  color: #FFF;
  margin: 0;
  padding: 0;
  padding-top: 10px;
  padding-bottom: 10px;
  transition: all .3s ease;
}
nav ul > ol > li:hover a {
  margin: 20px;
}
nav ul > ol > li:hover {
  background: #000;
  cursor: pointer
}
nav ul input {
  opacity: .7;
  padding: 5px;
  float: right;
  display: none
}
@media screen and (max-width:680px){
  nav ul > li:not(:first-child) {
    display:none
  }
  nav ul > li:last-of-type {
    display: block
  }
  nav ul input {
    display: inline
  }
}
@media screen and (min-width:680px) {
  nav ul > ol > li {
    display:none
  }
}
.odjava {
    float: right;
}
.ime1 {
    margin-right: 4%;
    margin-left: 0.8%;
}
.naslov {
    position: relative;
      font-family: Impact, sans-serif;
      font-size: 45px;
      letter-spacing: 2px;
      background: linear-gradient(90deg, #DAA520, #FFD700, #000);
      background-repeat: no-repeat;
      background-size: 80%;
      animation: animate 5s infinite;
      -webkit-background-clip: text;
      -webkit-text-fill-color: rgba(255, 255, 255, 0);
      margin-top: 9%;
      margin-left: 27%;
      }
      @keyframes animate {
      0% {
      background-position: -500%;
      }
      100% {
      background-position: 500%;
      }
      }
}



</style>
</head>

<body>
<nav>
  <ul>
    <li><a href="home.php">Početna </a></li>
    <li><a href="rezultati.php">Anketa - rezultati </a></li>
    <li><a href="informacije.php">Informacije </a></li>
    <li class="odjava"><a href="odjava.php">Odjavi me<a></li>
    <li>
      <a href="#">
        <i class="fa fa-bars"></i>
      </a>
    </li>
  </ul>
</nav>
<script>
$(function() {
  var ulLi = $('nav ul > li'),
      fa = $('nav ul > li:last-of-type a .fa');
  
   $('nav ul').append('<ol></ol>');
  
   $('nav').each(function() {
     for (var i=0; i <= ulLi.length - 3; i++) {
       $('nav ul > ol').append("<li>"+ i +"</li>");
       $('nav ul > ol > li').eq(i).html(ulLi.eq(i+1).html());
     }
  });

  $('nav ul > li:last-of-type').on('click', function() {
    fa.toggleClass('fa-bars');
    fa.toggleClass('fa-times');
    $(this).parent().children('ol').slideToggle(500);
  });
});
</script>

<div class="forma-ankete">
<form action="popunjena.php" method="GET">
<h1>Anketa</h1>
<hr>
<br>
<h3>1. Po Vašem mišljenju, približna starost planete Zemlje je:
<br>
<br>
<input type="radio" name="izbor1" value="4.54 milijarde godina" /><label class="ime1">4.54 milijarde godina</label>
<input type="radio" name="izbor1" value="6000-10000 godina" /><label class="ime1">6000-10000 godina</label>
<input type="radio" name="izbor1" value="200 miliona godina" /><label class="ime1">200 miliona godina</label>
<hr>
<br>
<h3>2. Celokupan živi svet na planeti formiran je procesom/procesima:
<br>
<br>
<input type="checkbox" name="izbor2[]" value="Kreacije" /><label class="ime1">Kreacije/Stvaranja</label>
<input type="checkbox" name="izbor2[]" value="Evolucije" /><label class="ime1">Evolucije</label>
<input type="checkbox" name="izbor2[]" value="Ne možemo znati" /><label class="ime1">Ne možemo znati</label>
<hr>
<br>
<h3>3. Da li podržavate teoriju Velikog Praska koja nastoji da objasni postanak celog univerzuma?
<br>
<br>
<input type="radio" name="izbor3" value="DA" /><label class="ime1">Podržavam</label>
<input type="radio" name="izbor3" value="NE" /><label class="ime1">Ne, ne postoje dokazi</label>
<input type="radio" name="izbor3" value="Nisam siguran/a" /><label class="ime1">Nisam siguran/a</label>
<hr>
<br>
<h3>4. Koje je Vaše mišljenje o činjenici da je teorija evolucije obavezan deo obrazovnog sistema u osnovnim i srednjim školama?
<br>
<br>
<select name="izbor4" class="school">
<option class="opcija" value="0">Odaberite</option>
    <option class="opcija" value="Podržavam">Podržavam u potpunosti</option>
    <option class="opcija" value="Nemam problem">Nemam problem sa tim</option>
    <option class="opcija" value="Ne bavim se time">Nisam razmišljao/la o tome</option>
    <option class="opcija" value="To treba biti izbor">Smatram da to treba da bude izbor pojedinca</option>
    <option class="opcija" value="Ne slažem se">Ne slažem se sa tim </option>
</select>
<hr>
<br>
<h3>5. Smatrate li da religija i nauka mogu da funkcionišu zajedno po pitanju objašnjenja celokupnog živog i neživog sveta?
<br>
<br>
<input type="radio" name="izbor5" value="Naravno" /><label class="ime1">Naravno</label>
<input type="radio" name="izbor5" value="Postoji mogućnost" /><label class="ime1">Postoji mogućnost</label>
<input type="radio" name="izbor5" value="Nisam siguran/la" /><label class="ime1">Nisam siguran/a</label>
<input type="radio" name="izbor5" value="Ne, razlike su očigledne" /><label class="ime1">Ne, razlike su očigledne</label>
<hr>
<br>
<h3>6. Kakvo je Vaše mišljenje o konceptu Prirodne selekcije, opstanku "najjačih vrsta" ?
<br>
<br>
<select name="izbor6" class="school2">
<option class="opcija" value="0">Odaberite</option>
    <option class="opcija" value="Dokazana činjenica">Dokazana činjenica</option>
    <option class="opcija" value="Ima smisla, ali ne i dovoljno dokaza">Ima smisla, ali ne i dovoljno dokaza</option>
    <option class="opcija" value="Otvoreno pitanje">Otvoreno pitanje</option>
    <option class="opcija" value="Nisam siguran/la">Nisam siguran/la</option>
    <option class="opcija" value="Ne podržavam, kao i ostatak teorije evolucije">Ne podržavam, kao i ostatak teorije evolucije</option>
</select>
<hr>
<br>
<h3>7. Da li su pronadjeni fosili ubedljiv dokaz za postojanje prelaznih formi i izumrlih vrsta?
<br>
<br>
<input type="radio" name="izbor7" value="Da, jesu" /><label class="ime1">Da, jesu</label>
<input type="radio" name="izbor7" value="Nisam siguran/la" /><label class="ime1">Nisam siguran/a</label>
<input type="radio" name="izbor7" value="Nisu" /><label class="ime1">Ne</label>
<hr>
<br>
<h3>8. Da li smatrate da koncpet Stvaranja treba da bude ubačen u obrazovni sistem paralelno sa konceptom Evolucije?
<br>
<br>
<input type="radio" name="izbor8" value="Apsolutno" /><label class="ime1">Apsolutno</label>
<input type="radio" name="izbor8" value="Zašto da ne, svako ima pravo izbora" /><label class="ime1">Zašto da ne, svako ima pravo izbora</label>
<input type="radio" name="izbor8"  value="Nisam razmišljao/la o tome" /> <label class="ime1">Nisam razmišljao/la o tome</label>
<input type="radio" name="izbor8"  value="Ne, jer nema naučno utemeljenje" /> <label class="ime1">Ne, jer nema naučno utemeljenje</label>
<hr>
<br>
<h3>9. Selektujte stavke koje smatrate kompatibilnim sa Vašim shvatanjem postanka i razvoja sveta:
<br>
<br>
<input type="checkbox" name="izbor9[]" value="Heliocentrični sistem"/><label class="ime1">Heliocentrični sistem</label>
<input type="checkbox" name="izbor9[]" value="Geocentrični sistem" /><label class="ime1">Geocentrični sistem</label>
<input type="checkbox" name="izbor9[]" value="Ravna Zemlja" /><label class="ime1">Ravna Zemlja</label>
<input type="checkbox" name="izbor9[]" value=" Zemlja geoid" /><label class="ime1">Zemlja geoid</label>
<input type="checkbox" name="izbor9[]" value="Postojanje dinosaurusa" /><label class="ime1">Postojanje dinosaurusa</label>
<hr>
<br>
<h3>10. Molimo Vas da u datom tekstualnom polju napišete Vaše zanimanje ili studije koje pohadjate:
<br>
<br>
<input type="text" name="izbor10" class="polje"/>
<hr>
<br>
<input type="submit" name="krajAnkete" value="Završi" class="kdugme" />
</form>
</div>


</body>
</html>