<?php
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



if ($conn->query($sql) === TRUE) {
    //used for testing
    //echo "New record created successfully";
} else {
    //used for testing
    //echo "Error: " . $sql . "<br>" . $pdo->error;
}
//query to run
$sql = "SELECT PlayerFName, PlayerLName, Amount, Bonuses FROM Salary WHERE Bonuses > (SELECT MIN(Amount) FROM Salary WHERE Amount > 0) GROUP BY PlayerLName";

$result = mysqli_query($conn, $sql);

$queryData = "
<table border='1' align = center>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Bonuses (millions)</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    $queryData .= "<tr>
<td>{$row['PlayerFName']}</td>
<td>{$row['PlayerLName']}</td>
<td>{$row['Bonuses']}</td>
</tr>";
}
echo "</table>";

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
            <div id="header">
                <h1>NHL Database</h1>
            </div>
            <div id="section">
                The minimum salary is 0.575 (million).  Therefore, this table will include all players who earned more than 0.575 in bonuses.
                <div id="form">
                    <form>
                        <?php echo $queryData ?>
                    </form>
                </div>
            </div>
        </main>
        <div id="footer">
            <a href="index.php">Home</a>   
        </div>
    </body>
</html>

