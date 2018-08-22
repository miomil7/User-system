<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
</head>
<body>
<?php include "nav.php";
?>
<br><h1 align="center">SEARCH</h1><br>


<h4 align="center">Search by name</h4><br>
<form action="search.php" method="post">
    <h4 align="center"><input type="text" name="imeLog" placeholder="Write name"/>
        <input type="submit" value="Search" name="submitName"/></h4><br/>
    <h4 align="center">Search by username</h4><br>
    <form action="" method="post">
        <h4 align="center"><input type="text" name="userLog" placeholder="Write username"/>
            <input type="submit" value="Search" name="submitUser"/></h4><br/>


        <h1 align="center"><input type="submit" value="Show all users" name="svi"/></h1>
    </form>
    <?php

    $link = mysqli_connect("localhost", "root", "", "registracija");

    if ($link === false)
        die("ERROR! " . mysqli_connect_error());

    //Pretraga  klijenata

    if (isset($_POST["svi"])) {
        $sql = "SELECT * FROM logovanje";
        }
         elseif (isset($_POST["submitName"])) {
        $sql = "SELECT * FROM logovanje WHERE name = '{$_POST['imeLog']}'";
        }
         elseif (isset($_POST["submitUser"])) {
        $sql = "SELECT * FROM logovanje WHERE mail = '{$_POST['userLog']}'";
        }

        if ($result = mysqli_query($link, $sql)) {

            if (mysqli_num_rows($result) > 0) {

//               <table class="table">;
//  <thead class="thead-dark">;
//    echo "<tr>";
//      echo "<th scope='col'>Name</th>";
//      echo "<th scope='col'>Surname</th>";
//      echo "<th scope='col'>Mail</th>";
//    echo "</tr>";
//  echo "</thead>";
//  while ($row = mysqli_fetch_array($result)) {
//  echo "<tbody>";
//    echo "<tr>";
//     echo "<td>" . $row['name'] . "</td>";
//     echo "<td>" . $row['surname'] . "</td>";
//     echo "<td>" . $row['mail'] . "</td>";
//    echo "</tr>";
//    echo "<tr>";
//
//  echo "</tbody>";
//echo "</table>";

                echo "<table>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Mail</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['mail'] . "</td>";
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

    mysqli_close($link);


    ?>

    <hr></hr>

</body>

</html>