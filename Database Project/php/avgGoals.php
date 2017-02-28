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

//query to run
$sql = "SELECT PlayerFName, PlayerLName, Goals FROM Statistics WHERE Goals > (SELECT AVG(Goals) FROM Statistics) GROUP BY PlayerLName";

$result = mysqli_query($conn, $sql);

$queryData = "
<table border='1' align = center>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Goals Scored</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    $queryData .= "<tr>
<td>{$row['PlayerFName']}</td>
<td>{$row['PlayerLName']}</td>
<td>{$row['Goals']}</td>
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
                The average amount of goals scored is 7.3.  Therefore, this table will include all players who scored 8 or more goals.
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

