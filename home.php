<?php
session_start();
if(empty($_SESSION['imeprezime']))
{
  header("Location: index.php");
  exit();
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title> Početna </title>
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
body{
  background-image: url("pozadina3.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center;
  
}

.wrap {
  width:28%;
  max-width: 27%;
  border-radius: 20px;
  margin: auto;
  background: rgba(0,0,0,0.8);
  box-sizing: border-box;
  padding: 40px;
  color: #fff;
  margin-top: 50px;
  float: left;
  margin-left: 3%;
}

.odgovor {
  text-align: justify;
  word-spacing: 1px;
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
  background-color: red;
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

textarea {
  outline: none;
  overflow: auto;
}
.dugme {
  border-radius:15%;
  background-color:#261ddb;
  color: white;
  padding: 4px 12px;
  font-size: 120%;
  margin-top: 10%;
  margin-bottom: 0;
  max-width: 90%;
  float: right;
  margin-right: 5%;
}
.tekst {
  resize: none;
  max-width: 100%;
}
.strana {
  width: 33%;
  float: left;
  max-width:33%;
}
.slikastrana {
  width: 400px;
  margin-left: 1.5%;
  max-width: 100%;
  height: auto;
  margin-top: 4%;
}
.slikastrana2 {
  width: 300px;
  margin-left: 40%;
  max-width: 100%;
  height: auto;
}

</style>
<meta charset="UTF-8">
<title>Početna</title>
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

<h1 class="naslov"> Dobro došli <?php echo $_SESSION['imeprezime']  ?> ! </h1>
<div class="strana">
<img src="kreacija.png" class="slikastrana" />
</div>
<div class="wrap">
<form action="anketa.php" method="GET">
<h4 class="odgovor">Molimo Vas da pre ankete odgovorite na sledeće pitanje. <br>Da li smatrate da je teorija evolucije dokazana činjenica?<br>
 Ukratko obrazložite Vaš odgovor.<br>
 <br>
<textarea wrap="off" cols="48" rows="3" class="tekst" name="nultopitanje">
</textarea>
<br>
<input type="submit" name="dalje" value="Nastavi" class="dugme" />
</form>
</div>
<div class="strana">
<img src="darwin.png" class="slikastrana2" />
</div>
</body>

</html>