<?php
$_REQUEST['userid']=!empty($_REQUEST['userid']) ? $_REQUEST['userid'] : '';
$_REQUEST['passwd']=!empty($_REQUEST['passwd']) ? $_REQUEST['passwd'] : '';
$_REQUEST['gender']=!empty($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
$_REQUEST['games']=!empty($_REQUEST['games']) ? $_REQUEST['games'] : array();
$_REQUEST['age']=!empty($_REQUEST['age']) ? $_REQUEST['age'] : '';
$_REQUEST['birthday']=!empty($_REQUEST['birthday']) ? $_REQUEST['birthday'] : '';
$_REQUEST['comments']=!empty($_REQUEST['comments']) ? $_REQUEST['comments'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Registration Form</h1>

    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="userid" name="userid" value="<?php echo $_REQUEST['userid']; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="passwd" name="passwd" value="<?php echo $_REQUEST['passwd']; ?>" required><br><br>
    
        <?php echo "<font color='red'>".(view_errors($errors))."</font>"; echo "<br><br>";?>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Don't want to say</option>
        </select><br><br>

        <label>Games willing to play:</label><br>
        <input type="checkbox" id="game1" name="games[]" value="guessGame">
        <label for="game1">guessGame</label><br>
        <input type="checkbox" id="game2" name="games[]" value="rockPaperScissors">
        <label for="game2">rockPaperScissors</label><br>
        <input type="checkbox" id="game3" name="games[]" value="frogpuzzles">
        <label for="game3">frog puzzles</label><br><br>

        <label for="age">Age:</label><br>
        <input type="radio" id="age1" name="age" value="10-20">
        <label for="age1">10-20</label><br>
        <input type="radio" id="age2" name="age" value="20-30">
        <label for="age2">20-30</label><br>
        <input type="radio" id="age3" name="age" value="30-40">
        <label for="age3">30-40</label><br>
        <input type="radio" id="age4" name="age" value="other">
        <label for="age4">Don't want to say</label><br><br>

        <label for="birthday">Birthday:</label><br>
        <input type="date" id="birthday" name="birthday" required><br><br>

        <label for="comments">Comments (maximun 20 characters):</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>

        <input type="submit" name="submitform" value="Submitform">
    </form> 
</body>
</html>
