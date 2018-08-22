<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
<?php include_once "nav.php";
?>
<br><h1 align="center">LOG IN</h1><br>


<form method="post">
    <h2 align="center" <label>Mail:</label>
   <input type="text" name="ImeLog"  required="required" placeholder="Mail"/></h2><br />
    <h2 align="center"><label>Password:</label>
    <input type="password" name="LozinkaLog"  required="required" id="1" placeholder="Password"/></h2>
    <h2 align="center"> <input type="submit" value="Log in" name="submit"/></h2><br />
</form>
    <h2>If you do not have account, please click <a href="registracija.php">here.</a></h2>
<?php
session_start();
if(isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host={$servername};dbname=registracija", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        if ($_POST['ImeLog'] !== "" && $_POST['LozinkaLog'] !== "") {
            $query = $conn->prepare("SELECT mail FROM logovanje WHERE mail = '{$_POST['ImeLog']}'
and password = '{$_POST['LozinkaLog']}'");
            $query->execute();
            $result = $query->fetchAll();
}


if(!empty($result)){
    header("Location: search.php");
        } else {
            echo "Wrong username or password!";
        }

        $conn = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }



}

?>


<hr></hr>

</body>

</html>