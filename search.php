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

    $link = mysqli_connect("localhost", "root", "", "registracija");

    if ($link === false)
        die("ERROR! " . mysqli_connect_error());
if (isset($_POST["svi"])) {
    $sql = "SELECT username FROM logovanje";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>All users:</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        } else {
            echo "There is no user with that username";
        }
    }else {
        echo "ERROR: Could not able to execute $sql. " .
            mysqli_error($link);
    }

if (isset($_POST["submit"])) {
    $sql = "SELECT username FROM logovanje WHERE username = '{$_POST['imeLog']}'";
    print_r($sql);
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>User:</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['imeLog'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        } else {
            echo "No user with that username";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " .
            mysqli_error($link);
    }
}


    mysqli_close($link);

}


?>

<hr></hr>

</body>

</html>