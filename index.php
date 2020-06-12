<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Prijava i Registracija</title>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <style>
        body {
        background: linear-gradient(rgba(53, 53, 155, 0.5),rgba(0,0,50,0.5)),url(pozadina.jpg);
        background-size: cover;
        background-repeat: no-repeat; }

        .login-box {
            max-width: 700px;
            float: none;
            margin: 150px auto;
        }
        .login-left {
            background: rgba(255, 255, 255, 0.5);
            padding: 30px;
        }
        .login-right {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
        }
        #pl {
            margin-left: 20px;
        }
    </style>
</head>


<body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>

<div class="container">
    <div class="login-box">
    <div class="row">
        <div class="col-md-6 login-left">
<h2>Prijavite se</h2>
<form action="prijava.php" method="POST">
    <div class="form-group">
        <label>E-mail adresa</label>
        <input type="text" name="mejl" class="form-control" required>
    </div>
    <div class="form-group">
            <label>Lozinka</label>
            <input type="password" name="sifra" class="form-control" required>
        </div>
        <button type="submit" name="lgin" class="btn btn-primary">Prijava</button>
</form>
    </div>


    <div class="col-md-6 login-right">
            <h2>Registrujte se</h2>
            <form action="validacija.php" method="POST">
                <div class="form-group">
                    <label>Ime i prezime</label>
                    <input type="text" name="imeprez" class="form-control" required>
                </div>
                <div class="form-group">
                        <label>E-mail adresa</label>
                        <input type="text" name="mail" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label>Lozinka</label>
                            <input type="password" name="lozinka" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label>Starost</label>
                                <input type="text" name="godine" class="form-control" required>
                            </div>
                            <div class="form-group">
                                    <label>Pol</label>
                                    <input type="radio" id="pl" name="pol" value="Muški"  required>
                                    Muški
                                   <input type="radio" id= "pl" name="pol" value="Ženski"  required>
                                   Ženski
                                   <input type="radio" id="pl" name="pol" value="Drugo" required>
                                   Drugo  
                                </div>
                                <div class="form-group">
                                    <label>Admin</label>
                                    <input type="radio" id="pl" name="admin" value="Da"  required>
                                    Da
                                    <input type="radio" id="pl" name="admin" value="Ne"  required>
                                    Ne
                                </div>
                    <button type="submit" class="btn btn-primary" name="korisnik">Registracija</button>
            </form>
                </div>

    </div>

</div>
</div>

</body>
</html>