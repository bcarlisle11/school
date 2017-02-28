<?php
//get the input values
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$server = "localhost";
$user = "root";
$pw = "root";
$dbname = "nhl";

//create connection
$pdo = new mysqli($server, $user, $pw, $dbname);
//check connection
if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}

$sql = "DELETE FROM Player WHERE FName='$fname' AND LName='$lname'";

if ($pdo->query($sql) === TRUE) {
    $msg = "$fname $lname successfully deleted.";
} else {
    $msg = "Error: Our records indicate that $fname $lname did not play in the NHL during the 2015-16 season.  Please try another player.";
}

//close connection
$pdo->close();
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>NHL DB</title>
        <link rel="stylesheet" href="../css/cs434.css">
    </head>
    <body>
        <main>
            <div id="header">
                <h1>NHL Database</h1>
                <div id="form">
                    <form method ="post" action="">
                        <?php echo $msg ?>
                    </form>
                </div>
            </div>
        </main>
        <div id="footer">
            <a href="index.php">Home</a>
        </div>
    </body>
</html>