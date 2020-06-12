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
body{
  background-image: url("pozadina4.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center;
  
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
      font-size: 80px;
      letter-spacing: 2px;
      background: linear-gradient(90deg, #DAA520, #FFD700, #000);
      background-repeat: no-repeat;
      background-size: 80%;
      animation: animate 5s infinite;
      -webkit-background-clip: text;
      -webkit-text-fill-color: rgba(255, 255, 255, 0);
      margin-top: 15%;
      text-align: center;
      }
      @keyframes animate {
      0% {
      background-position: -500%;
      }
      100% {
      background-position: 500%;
      }
    }
</style>
<meta charset="UTF-8">
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
<h1 class="naslov"> Hvala Vam što se učestvovali u našoj anketi,<br> <?php echo $_SESSION['imeprezime']  ?> ! </h1>
</body>
</html>