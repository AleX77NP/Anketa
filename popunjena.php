<?php

if(isset($_GET['krajAnkete'])) {
    session_start();

$serverime = "localhost";
    $Username = "root";
    $passw = "";
    $imeBaze = "anketa";

$konekcija = mysqli_connect($serverime,$Username,$passw,$imeBaze);
if(!$konekcija)
{
    die("Konekcija nije uspela: ".mysqli_connect_error());
}
$nultoPitanje = $_SESSION['nulto'];
$osoba = $_SESSION['imeprezime'];

$odgovor2 = implode(',', $_GET['izbor2']);
$odgovor9 = implode(',', $_GET['izbor9']);

$odgovor1 = $_GET['izbor1'];
$odgovor3 = $_GET['izbor3'];
$odgovor4 = $_GET['izbor4'];
$odgovor5 = $_GET['izbor5'];
$odgovor6 = $_GET['izbor6'];
$odgovor7 = $_GET['izbor7'];
$odgovor8 = $_GET['izbor8'];
$odgovor10 = $_GET['izbor10'];

if(empty($odgovor1) || empty($odgovor2) || empty($odgovor3) || empty($odgovor4) || empty($odgovor5)
|| empty($odgovor6) || empty($odgovor7) || empty($odgovor8) || empty($odgovor9) || empty($odgovor10))
{
    header("Location: anketa.php?error=emptyfields");
    exit();
}

$ubaci = "INSERT INTO popunjena (osoba,odgovor0,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,
odgovor7,odgovor8,odgovor9,odgovor10) VALUES ('$osoba','$nultoPitanje','$odgovor1','$odgovor2',
'$odgovor3','$odgovor4','$odgovor5','$odgovor6','$odgovor7','$odgovor8','$odgovor9','$odgovor10')";

$rezultatAnkete = mysqli_query($konekcija,$ubaci);

mysqli_close($konekcija);
header("Location: kraj.php");
exit();
}
else
{
    header("Location: anketa.php");
    exit();
}

?>