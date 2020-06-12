<?php

session_start();
if(empty($_SESSION['imeprezime']))
{
  header("Location: index.php");
  exit();
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


main {
	max-height: 550px;;
	background-color: #292c2f;
	color: white;
	font-size: 38pt;
	text-align: center;
	line-height: 550px;
}
footer{
	bottom:0;
}
.footer-distributed{
	background-color: rgba(0,0,0,0.7);
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;
 
	padding: 5px 40px;
	margin-top: 0;
}
 
.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
	display: inline-block;
	vertical-align: top;
}
 
.footer-distributed .footer-left{
	width: 40%;
}
 
.footer-distributed h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}
 
.footer-distributed h3 span{
	color:  #5383d3;
}
 
 
.footer-distributed .footer-links{
	color:  #ffffff;
	margin: 20px 0 12px;
	padding: 0;
}
 
.footer-distributed .footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}
 
.footer-distributed .footer-company-name{
	color:  #8f9296;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}
 
 
.footer-distributed .footer-center{
	width: 35%;
}
 
.footer-distributed .footer-center i{
	background-color:  #33383b;
	color: #ffffff;
	font-size: 25px;
	width: 38px;
	height: 38px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
}
 
.footer-distributed .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}
 
.footer-distributed .footer-center p{
	display: inline-block;
	color: #ffffff;
	vertical-align: middle;
	margin:0;
}
 
.footer-distributed .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
}
 
.footer-distributed .footer-center p a{
	color:  #5383d3;
	text-decoration: none;;
}
 
.footer-distributed .footer-right{
	width: 20%;
}
 
.footer-distributed .footer-company-about{
	line-height: 20px;
	color:  #92999f;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}
 
.footer-distributed .footer-company-about span{
	display: block;
	color:  #ffffff;
	font-size: 14px;
	font-weight: bold;
	margin-bottom: 20px;
}
 
.footer-distributed .footer-icons{
	margin-top: 25px;
}
 
.footer-distributed .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:  #33383b;
	border-radius: 2px;
 
	font-size: 20px;
	color: #ffffff;
	text-align: center;
	line-height: 35px;
 
	margin-right: 3px;
	margin-bottom: 5px;
}
 
 
@media (max-width: 880px) {
 
	.footer-distributed{
		font: bold 14px sans-serif;
	
	}
 
	.footer-distributed .footer-left,
	.footer-distributed .footer-center,
	.footer-distributed .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}
 
	.footer-distributed .footer-center i{
		margin-left: 0;
	}
	.main {
		line-height: normal;
		font-size: auto;
	}
 
}


.tabela {
    width: 100%;
    height: auto;
    background-color: rgba(0,0,0,0.7);
    color: white;
    text-align: center;
}

.heder1 {
    height: 80px;
}
.opisi {
width:33%;
}

.slika12 {
    width:100%;
    max-width:100%;
    height: 75.5%;
}

.slika13 {
    width:100%;
    max-width:100%;
    height: 82.5%;
}

.slika14 {
    width:100%;
    max-width:100%;
    height: 147%;
}
.nagl {
    color:red;
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
 <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
  <title>O anketi</title>
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
<table border="1" class="tabela">

<tr>
<td colspan="3" class="heder1"> <h1> O ANKETI </h1> </td>

</tr>
<tr>
<td> <h1> Kreacionizam? </h1> </td>
<td> <h1> Zlatna sredina? </h1> </td>
<td> <h1> Evolucionizam? </h1> </td>
</tr>
<tr>
<td class="opisi"> <h4> Kreacionizam je religijsko verovanje po kojem je celokupno čovečanstvo i sva živa bića, Zemlja, i kosmos kao sveobuhvatna celina, posljedica božanskog stvaralaštva, ili jednostavno Boga, opisanog u mnogim religijskim svetim spisima.
Sam događaj se može promatrati ili kao čin kreacije, stvaranja ('ex nihilo') ili nastajanje iz prethodnog haosa ('demijurg'). Iako ovo verovanje može biti doslovno interpretirano (kao fizikalna teorija), religiozna rasprava se obično ograničava na duhovna značenja. Ponekad neki kreacionisti ističu duhovnu prirodu ljudskih bića, tvrdeći da je duhovna priroda osnova cele prirode, i proglašavajući ostala gledišta materijalističkim ili ignorantnim prema duhovnim konceptima.
 </h4> </td>
<td class="opisi"> <h4> Ovaj pravac predstavlja neku vrstu "kompromisa" izmedju 2 pomenuta. Mnogi koji veruju u Stvaranje drže da je takvo verovanje deo religije, i zato u skladu s naučnim pogledima, ili nedirnuto njima; drugi drže da su naučni podaci u skladu s kreacionizmom. Oni koji podržavaju <span class="nagl">evolucioni kreacionizam</span> mogu tvrditi da razumeju naučne mehanizme kao jednostavne aspekte vrhovne kreacije. Osim toga, neki naučno-orijentirani vernici shvataju Stvaranje opisano u svetim knjigama jednostavno kao metaforu. </h4> </td>
<td class="opisi"> <h4> Evolucionizam je izraz koji se često koristi za označavanje teorije evolucije. Njegovo tačno značenje se vremenom menjalo kako napreduje istraživanje evolucije. U 19. veku je korišćeno da se opiše verovanje da su se organizmi namerno poboljšali putem progresivne nasledne promene (ortogeneza). Teleološko verovanje je takođe obuhvatalo kulturnu evoluciju i društvenu evoluciju. Sedamdesetih godina prošlog veka pojam neoevolucionizam korišćen je za opis ideje "da su ljudska bića želela da sačuvaju poznati stil života osim ako ih promene nisu prisiljavali faktori koji su bili van njihove kontrole". </h4> </td>
</tr>

<tr>
<td>
<img src="creat.jpg" alt="creation" class="slika13" />
</td>
<td>
<img src="borba.jpg" alt="creation" class="slika14" />
</td>
<td>
<img src="evol.jpg" alt="evolution" class="slika12"/>
</td>
</tr>

</table>

<footer class="footer-distributed">
 
		<div class="footer-left">
 
		<h3>AM<span>Develop</span></h3>
 
 
		<p class="footer-company-name">amdevelop &copy; 2019</p>
		</div>
 
		<div class="footer-center">
 
		<div>
		<i class="fa fa-map-marker"></i>
		<p><span>Ulica Miodraga Jovanovića 7</span> Novi Pazar, Srbija</p>
		</div>
 
		<div>
		<i class="fa fa-phone"></i>
		<p>020 600 889</p>
		</div>
 
		<div>
		<i class="fa fa-envelope"></i>
		<p><a href="milanovicaleX77@gmail.com">milanovicaleX77@gmail.com</a></p>
		</div>
 
		</div>
 
		<div class="footer-right">
 
		<p class="footer-company-about">
		<span>O nama</span>
	Za sve dodatne informacije, kontaktirajte nas preko e-maila ili na broj telefona koji je priložen pored.
		</p>
 
		
 
		</div>
 
		</footer>
 
</body>
</html>
