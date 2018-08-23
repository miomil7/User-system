
<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        #navigation ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #navigation li {
            background: #ccc;
            border-left: 1px solid #999;
            float: left;
            margin: 0;
            padding: 0;
        }

        #navigation a {
            color: #666;
            font-weight: bold;
            padding: 5px 10px;
            text-decoration: none;
        }

        #navigation a:hover {
            color: #333;
        }

        #navigation #currentpage a {
            background: #fff;
            color: #333;
        }
    </style>
<body>
<div id="navigation">
    <ul>
        <li><a href="LogIn.php">Log in</a></li>
        <li id="currentpage"><a href="registracija.php">Register</a>
        </li>
        <li><a href="search.php">Search users</a></li>
        <li><a href="profil.php">My profile</a></li>
        <li><a href="logout.php">Log out</a></li>

    </ul>
</div>
</body>
</html>


