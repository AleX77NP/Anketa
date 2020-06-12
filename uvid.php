<?php

    $serverime = "localhost";
    $Username = "root";
    $passw = "";
    $imeBaze = "anketa";

$konekcija = mysqli_connect($serverime,$Username,$passw,$imeBaze);
if(!$konekcija)
{
    die("Konekcija nije uspela: ".mysqli_connect_error());
}

session_start();
if(empty($_SESSION['imeprezime']))
{
  header("Location: index.php");
  exit();
}

if($_SESSION['adm']=="Ne")
{
  header("location:javascript://history.go(-1)");
  exit();
}

if(isset($_GET['delete'])) {
    $cekirane = $_GET['checkbox'];
    foreach($cekirane as $idb) {
      $brisanje = "DELETE FROM popunjena WHERE id=$idb";
        $rez = mysqli_query($konekcija,$brisanje);
        header("Location: upit.php");
        exit();
    }
}


$sql = "SELECT * FROM popunjena";
$upit = mysqli_query($konekcija,$sql);

$ankete = mysqli_fetch_all($upit,MYSQLI_ASSOC);

mysqli_close($konekcija);

?>

<!DOCTYPE html>
<html>
<head>
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

table, th, td {
    width: 100%;
    margin: auto;
    border: 1px solid white;
    border-collapse: collapse;
    text-align: center;
    table-layout: fixed;
    background: rgba(0,0,0,0.3);
    color: white;
    font-size: 95%;
}
h1 {
    text-align: center;
    color: white;
    font-size: 250%;
}
.kdugme {
background-color:red;
color: #F0FFFF;
width: 15%;
font-size: 110%;
margin-top: 1.3%;
max-width: 7%;
min-width: 7%;
margin: auto;
margin-left: 49%;
}
</style>
<title>Uvid u ankete</title>
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
<br>
<h1>Popunjene ankete</h1>
<br>
<hr>
<form action="uvid.php" method="GET">
<table>
<tr>
<th>ID</th> <th>Osoba </th> <th>Mišljenje </th> <th>Odgovor 1 </th>
<th>Odgovor 2 </th> <th>Odgovor 3 </th> <th>Odgovor 4 </th> <th>Odgovor 5 </th> <th>Odgovor 6 </th>
<th>Odgovor 7 </th> <th>Odgovor 8 </th> <th>Odgovor 9 </th> <th>Odgovor 10 </th> <th>Brisanje</th>
</tr>
<?php foreach($ankete as $anketa) { ?>
<tr>
<td> <?php echo $anketa['id'] ?> </td>  <td> <?php echo $anketa['osoba']; ?> </td>
 <td> <?php echo $anketa['odgovor0']; ?> </td> <td> <?php echo $anketa['odgovor1']; ?> </td>
 <td> <?php echo $anketa['odgovor2']; ?> </td> <td> <?php echo $anketa['odgovor3']; ?> </td>
 <td> <?php echo $anketa['odgovor4']; ?> </td> <td> <?php echo $anketa['odgovor5']; ?> </td>
 <td> <?php echo $anketa['odgovor6']; ?> </td> <td> <?php echo $anketa['odgovor7']; ?> </td>
 <td> <?php echo $anketa['odgovor8']; ?> </td> <td> <?php echo $anketa['odgovor9']; ?> </td>
 <td> <?php echo $anketa['odgovor10']; ?> </td>
 <td> <input type="checkbox" name="checkbox[]" value=<?php echo $anketa['id']; ?> /> </td>
</tr>
<?php } ?>
</table>
<br>
<input type="submit" name="delete" value="Obriši" class="kdugme" />
</form>
</body>
</html>