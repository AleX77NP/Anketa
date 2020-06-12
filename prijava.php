<?php 

if(isset($_POST['lgin'])) {

    $serverime = "localhost";
    $Username = "root";
    $passw = "";
    $imeBaze = "anketa";

$konekcija = mysqli_connect($serverime,$Username,$passw,$imeBaze);
if(!$konekcija)
{
    die("Konekcija nije uspela: ".mysqli_connect_error());
}
$mail = $_POST['mejl'];
$pass =  $_POST['sifra'];

if(empty($mail) || empty($pass)) {
    header("Location: index.php?error=emptyfields");
    exit();
}
else {
    $sql = "SELECT * FROM korisnik WHERE email=?";
    $stmt = mysqli_stmt_init($konekcija);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: index.php?error=sqlerror");
    exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,"s",$mail);
        mysqli_stmt_execute($stmt);
        $rez = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($rez))
        {
           $proveraLozinke = password_verify($pass, $row['lozinka']);
           if($proveraLozinke == false)
           {
            header("Location: index.php?error=wrongpassword");
            exit();
           }
           else if($proveraLozinke == true) {
              session_start();
              $_SESSION['email'] = $row['email'];
              $_SESSION['imeprezime'] = $row['imeprezime'];
              $_SESSION['adm'] = $row['adm'];
              
              if($_SESSION['adm']=="Ne") {
            header("Location: home.php?login=uspesan");
            exit();
              }
              else {
                header("Location: uvid.php?login=uspesan");
                exit();
              }

           }
           else {
            header("Location: index.php?error=wrongpassword");
            exit();
           }
        }
        else {
            header("Location: index.php?error=nouser");
            exit();
        }
    }
}

}

else {
    header("Location: index.php");
    exit();
}


?>