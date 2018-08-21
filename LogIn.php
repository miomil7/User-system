<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
<h1 align="center">LOG IN</h1><br>


<form method="post">
    <h2 align="center" <label>Username:</label></h2>
   <h1 align="center"> <input type="text" name="ImeLog"  required="required" placeholder="Username"/></h1><br />
    <h2 align="center"><label>Password:</label></h2>
    <h1 align="center"><input type="password" name="LozinkaLog"  required="required" placeholder="Password"/></h1><br/><br />
    <h2 align="center"> <input type="submit" value="Log in" name="submit"/></h2><br />
</form>
    <h2>If you do not have account, please click <a href="registracija.php">here.</a></h2>
<?php

if(isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host={$servername};dbname=registracija", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        if ($_POST['ImeLog'] !== "" && $_POST['LozinkaLog'] !== "") {
            $query = $conn->prepare("SELECT username FROM logovanje WHERE username = '{$_POST['ImeLog']}'
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