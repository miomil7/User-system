<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
</head>
<body>
<h1 align="center">SEARCH</h1><br>


<h4 align="center">Search by name</h4><br>
    <form action="" method="post">
        <h4 align="center"> <input type="text" name="imeLog"  placeholder="Write name"/>
        <input type="submit" value="Search" name="submitName"/></h4><br />
<h4 align="center">Search by username</h4><br>
<form action="" method="post">
    <h4 align="center"><input type="text" name="userLog"  placeholder="Write username"/>
     <input type="submit" value="Search" name="submitUser"/></h4><br />


   <h1 align="center"> <input type = "submit" value="Show all users" name="svi"/></h1>
</form>
<?php

    $link = mysqli_connect("localhost", "root", "", "registracija");

    if ($link === false)
        die("ERROR! " . mysqli_connect_error());

    //Pretraga svih klijenata

if (isset($_POST["svi"])) {
    $sql = "SELECT * FROM logovanje";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>All users:</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['surname'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        } else {
            echo "There is no user with that username";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " .
            mysqli_error($link);
    }

    //Pretraga po name-u

    if (isset($_POST["submit"])) {
        $sql = "SELECT * FROM logovanje WHERE name = '{$_POST['imeLog']}'";


        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Name:</th>";
                echo "<th>Surname:</th>";
                echo "<th>Username:</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_free_result($result);
            } else {
                echo "No user with that name.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " .
                mysqli_error($link);
        }
//Pretraga po username-u

        if (isset($_POST["submit"])) {
            $sql = "SELECT * FROM logovanje WHERE username = '{$_POST['userLog']}'";
            print_r($sql);
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Name:</th>";
                    echo "<th>Surname:</th>";
                    echo "<th>Username:</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['surname'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
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
}

?>

<hr></hr>

</body>

</html>