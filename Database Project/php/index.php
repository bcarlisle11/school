<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>NHL DB</title>
        <link rel="stylesheet" href="../css/cs434.css">
    </head>
    <body>
        <div id="header">
            <h1>NHL Database</h1>
        
        <div id="section">
            <select onchange="window.location.href = this.value">
                <option value="blank">Choose an Option</option>
                <option value="addPlayer.php">Add a Player</option>
                <option value="removePlayer.php">Delete a Player</option>
                <option value="updateNum.php">Update a Player's Number</option>
                <option value="avgGoals.php">Players Who Scored More Goals Than the League Average</option>
                <option value="bonus.php">Players Who Earned More in Bonuses Than the Lowest Salary</option>
                <option value="query3.php">Players Who Are Younger Than the Average NHL Player</option>
            </select>
        </div>
        </div>
    </body>
</html>
