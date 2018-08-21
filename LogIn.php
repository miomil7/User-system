<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
<h1 align="center">LOG IN</h1><br>


<form action="" method="post">
    <h2 align="center" <label>Username:</label></h2>
   <h1 align="center"> <input type="text" name="ImeLog"  required="required" placeholder="Username"/></h1><br />
    <h2 align="center"><label>Password:</label></h2>
    <h1 align="center"><input type="password" name="LozinkaLog"  required="required" placeholder="Password"/></h1><br/><br />
</form>
    <form action="search.php" method="POST"></form>
   <h2 align="center"> <input type="submit" value="Log in" name="submit"/></h2><br />
</form>
<form action="search.php" method="POST"></form>
<form>
    <h2>If you do not have account, please click <a href="registracija.php">here.</a></h2>
</form>
<?php

if(isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host={$servername};dbname=registracija", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        if ($_POST['ImeLog'] !== "" && $_POST['LozinkaLog'] !== "") {
            $conn->exec("SELECT username FROM logovanje WHERE username = '{$_POST['ImeLog']}'
and password = {$_POST['LozinkaLog']}");
            $result=mysql_query($conn);
            header("Location: search.php");

        } else {
            echo "Wrong username or password!";
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