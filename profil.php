
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
</head>


<body>
<?php include_once "nav.php";

?>
<br><h1 align="center">MY PROFILE</h1><br><br>

<form action="" method="post">
    <h2 align="center"><label>Name:</label>

        <h2 align="center"><label>Surname:</label>

            <h2 align="center"><label>Mail:</label>



</form>
<hr></hr>
<form action="index.php" method="POST">
    <label>If you want to logout, click on the button!</label>
    <input type = "submit" value="Log out" name="Klikni"/><br>
</form>
<?php
$_SESSION['isLogIn']=$_POST['mail'];
if ($_SESSION['isLogIn']==null)
    header("Location: LogIn.php");
    echo "You must log in!"

?>
</body>
</html>