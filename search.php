<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
</head>
<body>
<h1 align="center">SEARCH</h1>
<h4 align="center">Search by username</h4><br>
<form action="" method="post">
    <h2 align="center"><label>Username:</label></h2>
    <h1 align="center"><input type="text" name="imeLog"  placeholder="Write username"/></h1>
    <h1 align="center"><input type="submit" value="Search" name="submit"/></h1><br />

   <h1 align="center"> <input type = "submit" value="Show all users" name="svi"/></h1>
</form>
<?php
if(isset($_POST["Show all users"])){


    $link = mysqli_connect("localhost", "root", "", "registracija");

if($link === false){
    die("ERROR! " . mysqli_connect_error());
    $sql = "SELECT * FROM 'logovanje'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>Username</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['Id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        } else{
            echo "No user with that username";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


    mysqli_close($link);
}
}


?>

<hr></hr>

</body>

</html>