<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<hr>
<h1 align="center">REGISTRATION</h1><br><br>


<form action="" method="post">
    <h2 align="center"><label>Username:</label></h2>
    <h1 align="center"><input type="text" name="Kor_Ime"  required="required" placeholder="Username"/></h1><br />
    <h2 align="center"><label>Password:</label></h2>
    <h1 align="center"><input type="password" name="lozinka"  required="required" placeholder="Password"/></h1><br />
    <h2 align="center"><label>Confirm password:</label></h2>
    <h1 align="center"><input type="password" name="potvrda_lozinke"  required="required" placeholder="Confirm password"/></h1><br />
   <h1 align="center"> <input type="submit" value="Register" name="Registruj se"/></h1><br />
</form>
<hr></hr>
<form action="LogIn.php" method="POST">
    <label>If you are already registr, click to log in!</label>
    <input type = "submit" value="Log in" name="Klikni"/><br>

</form>

<?php
if(isset($_POST["Registruj_se"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";


    try {
        $conn = new PDO("mysql:host={$servername};dbname=registracija", 'root', '');

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!   +++   ";

        if (($_POST['lozinka'] === $_POST['potvrda_lozinke']) && $_POST['Kor_Ime'] !== "" && $_POST['lozinka'] !== "") {

            $conn->exec("INSERT INTO logovanje(username, password) VALUES ('{$_POST['Kor_Ime']}', '{$_POST['lozinka']}')");
            echo "<meta http-equiv='refresh' content='0'>";
            echo "Uspesno ste se registrovali!";
        } else {
            echo "Registracija neuspesna!";
        }

        $conn = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
     die();
}

        ?>


<hr></hr>

</body>

</html>