<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$number = $_POST['number'];

$server = "localhost";
$user = "root";
$pw = "root";
$dbname = "nhl";

//create connection
$conn = new mysqli($server, $user, $pw, $dbname);
//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Player SET Number='$number' WHERE FName = '$fname' AND LName ='$lname'";


if ($conn->query($sql) === TRUE) {
    $msg = "You have succesfully updated $fname $lname jersey number to $number";
} else {
    $msg =  "Error creating database: " . $conn->error;
    //$msg = "Error updating $fname $lname jersey number.  Please try again.";
}

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
                <?php echo $msg ?>
            </div>
        </div>
        <div id="footer">
            <a href="index.php">Home</a>
        </div>
    </body>
</html>