<?php 

if(isset($_POST['korisnik'])) {
    $serverime = "localhost";
    $Username = "root";
    $passw = "";
    $imeBaze = "anketa";

$konekcija = mysqli_connect($serverime,$Username,$passw,$imeBaze);
if(!$konekcija)
{
    die("Konekcija nije uspela: ".mysqli_connect_error());
}

$imeprezime = $_POST['imeprez'];
$email = $_POST['mail'];
$lozinka = $_POST['lozinka'];
$starost = $_POST['godine'];
$pol = $_POST['pol'];
$adm =$_POST['admin'];


if(empty($imeprezime) || empty($email) || empty($lozinka) || empty($starost) || empty($pol)) {
header("Location: index.php?error=emptyfields&imeprez=".$imeprezime);
exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: index.php?error=invalidmail&imeprez=".$imeprezime);
  exit();
}
else if (!preg_match("/^([a-zA-Z' ćčČĆ]{6,30}+)$/",$imeprezime) && !filter_var($email, FILTER_VALIDATE_EMAIL))
{
    header("Location: index.php?error=invalidmailimeprez");
    exit();
}
else if(!preg_match("/^([a-zA-Z' ćčČĆ]{6,30}+)$/",$imeprezime)) {
    header("Location: index.php?error=invalidimeprez&mail=".$email);
    exit();
}
else if(!preg_match('/^[0-9]*$/',$starost))
{
    header("Location: index.php?error=invalidimeprez&mail=".$email);
    exit();
}
else if(strlen($lozinka) < '8'  || !preg_match("#[0-9]+#",$lozinka) || 
!preg_match("#[A-Z]+#",$lozinka) || !preg_match("#[a-z]+#",$lozinka)) {
    header("Location: index.php?error=invalidpassword&imeprez=".$imeprezime);
    exit();
}
else {
    $kor = "SELECT email FROM korisnik WHERE email=?";
    $stmt = mysqli_stmt_init($konekcija);
    if(!mysqli_stmt_prepare($stmt,$kor)) {
        header("Location: index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $brojac = mysqli_stmt_num_rows($stmt);
        if($brojac > 0)
        {
        header("Location: index.php?error=emailtaken&imeprez=".$imeprezime);
        exit();
        }
        else {
            $unos = "INSERT INTO korisnik (imeprezime,email,lozinka,starost,pol,adm) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($konekcija);
            if(!mysqli_stmt_prepare($stmt, $unos)) {
                header("Location: index.php?error=sqlerror");
                exit();
            }
            else {
                $protekcijaLozinke =  password_hash($lozinka, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sssiss",$imeprezime,$email,$protekcijaLozinke,$starost,$pol,$adm);
                mysqli_stmt_execute($stmt);
                header("Location: index.php?registracija=uspela");
                exit();
            }
        }
    }
}
mysqli_stmt_close($stmt);
mysqli_close($konekcija);
}
else {
    header("Location: index.php");
    exit();
}
?> 