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
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $pdo->error;
}
//query to run
$sql = "SELECT Fname, Lname, Age FROM Player WHERE Age <= (SELECT AVG(Age) FROM Player) GROUP BY Lname";

$result = mysqli_query($conn, $sql);

$queryData = "
<table border='1' align = center>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    $queryData .= "<tr>
<td>{$row['Fname']}</td>
<td>{$row['Lname']}</td>
<td>{$row['Age']}</td>
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
                The average age of an NHL Player is 26.3 years old.  Therefore, this table will include all players 26 and younger.
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
