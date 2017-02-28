<?php ?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Delete Player</title>
        <link rel="stylesheet" href="../css/cs434.css">
    </head>
    <body>
        <main>
            <div id="section">
                <div id="header">
                    <h1>NHL Database</h1>               
                    <div id="form">
                        Please insert the name of the player you would like to remove:<br><br>
                        <form method ="post" action="removePlayerQuery.php">
                            <label>First Name: </label><input type="text" name="fname" value=""><br><br>
                            <label>Last Name: </label><input type="text" name="lname" value=""><br><br>
                            <input id="submit" name ="cancel" type ="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <div id="footer">
            <a href="index.php">Home</a>
        </div>
    </body>
</html>