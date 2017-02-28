<?php
?>



<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Add New Player</title>
        <link rel="stylesheet" href="../css/cs434.css">
    </head>
    <body>
        <div id="header">
            <h1>NHL Database</h1>
            <div id="section">
                To add a new player, enter the values below:<br><br>
                <form method ="post" action="addPlayerQuery.php">
                    <label>First Name: </label><input type="text" name="fname" value=""><br><br>
                    <label>Last Name: </label><input type="text" name="lname" value=""><br><br>
                    <label>Team Abbreviation (3 Letters): </label><input type="text" name="team" value=""><br><br>
                    <label>Age (integer): </label><input type="text" name="age" value=""><br><br>                
                    <label>Jersey Number: </label><input type="text" name="number" value=""><br><br>
                    <label>Birthday (yyyy-mm-dd): </label><input type="text" name="bday" value=""><br><br>
                    <label>Birth City: </label><input type="text" name="bcity" value=""><br><br>
                    <label>Birth State/Province (if applicable): </label><input type="text" name="bsp" value=""><br><br>
                    <label>Birth Country: </label><input type="text" name="bcountry" value=""><br><br>
                    <label>Nationality: </label><input type="text" name="nat" value=""><br><br>
                    <label>Height (inches): </label><input type="text" name="ht" value=""><br><br>
                    <label>Weight (pounds): </label><input type="text" name="wt" value=""><br><br> 
                    <label>Shoots (R/L): </label><input type="text" name="shoots" value=""><br><br>
                    <label>Draft Year: </label><input type="text" name="draft" value=""><br><br>
                    <label>Draft Round: </label><input type="text" name="round" value=""><br><br>
                    <label>Overall Draft Position: </label><input type="text" name="overall" value=""><br><br>
                    <label>Position (D/C/LW/RW): </label><input type="text" name="pos" value=""><br><br>                     
                    <input name ="submit" type ="submit">
                </form>
            </div>
        </div>
        <div id="footer">
            <a href="index.php">Home</a>
        </div>
    </body>
</html>
