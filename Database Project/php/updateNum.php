<?php

?>


<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Update Player Number</title>
        <link rel="stylesheet" href="../css/cs434.css">
    </head>
    <body>
        <div id="header">
            <h1>NHL Database</h1>
            <div id="section">
                Please enter the name of the player and the new jersey number:<br><br>
                <form method ="post" action="updateNumber.php">
                    <label>First Name: </label><input type="text" name="fname" value=""><br><br>
                    <label>Last Name: </label><input type="text" name="lname" value=""><br><br> 
                    <label>Jersey Number: </label><input type="text" name="number" value=""><br><br>
                    <input name ="submit" type ="submit">
                </form>
            </div>
        </div>
        <div id="footer">
            <a href="index.php">Home</a>
        </div>
    </body>
</html>

