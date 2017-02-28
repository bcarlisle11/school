<?php
//get the input values
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$team = $_POST['team'];
$age = $_POST['age'];
$number = $_POST['number'];
$bday = $_POST['bday'];
$bcity = $_POST['bcity'];
$bsp = $_POST['bsp'];
$bcountry = $_POST['bcountry'];
$nat = $_POST['nat'];
$ht = $_POST['ht'];
$wt = $_POST['wt'];
$shoots = $_POST['shoots'];
$draft = $_POST['draft'];
$round = $_POST['round'];
$overall = $_POST['overall'];
$pos = $_POST['pos'];

$server = "localhost";
$user = "root";
$pw = "root";
$dbname = "nhl";

//create connection
$$conn = new mysqli($server, $user, $pw, $dbname);
//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Player (Fname, Lname, Team, Age, Number, Birthday, Birth_City, Birth_State_Province, Birth_Country, Nationality, Height, Weight, Handedness, Draft, Round, Overall, Position)
VALUES ('$fname', '$lname', '$team', '$age', '$number','$bday','$bcity','$bsp', '$bcountry', '$nat', '$ht', '$wt','$shoots','$draft','$round','$overall', '$pos')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $pdo->error;
}

//close connection
$conn->close();
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
            <div>
                <div id="header">
                    <h1>NHL Database</h1>
                    <div id="form">
                        <form method ="post" action="">
                            <?php echo $msg ?>
                            <a href="index.php">Home</a>
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