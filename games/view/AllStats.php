<?php
?>
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Games</title>

<style>
body{
        border: 1px solid grey;
}
header {
        margin-top: 15px;
        margin-left: 5px;
        margin-right: 6px;
}
section {
    margin-left: 10px;
}

h1{
        margin-left: 30px;
}

nav ul {
  border: 1.5px solid black;
  padding: 3px;
  list-style: none;
  align-items: center;
  display: flex;
  height: 70px;
}

nav li {
  width: 16.3%;
  justify-content: center;
  margin-right: 3px;
  margin-left:2px;
  height: 90%;
}

nav li.active a{
        background-color: white;
        color: black;
        border: 1.5px solid black;
        height: 90%;
}

nav a {
  padding-top: 5px;
  height: 93%;
  text-decoration: none;
  color: white;
  background-color: black; /* Set background color for each navigation bar */
  display: block; /* Make the entire area clickable */
  text-align: center;
}

@media screen and (max-width: 40em) {
  nav ul {
   flex-direction: column;
   padding-bottom:2px;
   height: auto;
  }

  nav li {
    padding-top: 3px;
        margin-bottom: 1px;
        width: 100%;
  }
}

footer{
  text-align: center;
  margin-bottom: 5px;
}
</style>
        </head>
        <body>
                <header>
                <nav>
                                <ul>
                                <li class='active'> <a href=?operation=allStats>All Stats</a> </li>
                                <li> <a href=?operation=guessGame>Guess Game</a> </li>
                                <li> <a href=?operation=rockPaperScissors>Rock Paper Scissors</a> </li>
                                <li> <a href=?operation=frogs>Frogs</a> </li>
                                <li> <a href=?operation=profiles>Profile</a> </li>
                                <li> <a href=?operation=logout>Logout</a> </li>
                                </ul>
                </nav>
                </header>
                <main>
                        <h1>Hi <?php echo $_SESSION['user'] ?> </h1>
                        <section class='stats'>
                                <h2>Game Stats</h2>
                                <h3><?php echo "<font color='red'>"."Refresh the page to get the new data"."</font>"; echo "<br><br>";?></h3>
				For guessGame you have wonned: <?php echo $_SESSION['haswonnedguess'] ?><br><br>
                                For rockpaperscissors you have wonned: <?php echo $_SESSION['haswonnedrock']?><br><br>
                                For frogJump you have wonned: <?php echo $_SESSION['haswonnedfrog']?><br><br>

                                <h2>Summary Stats</h2>
                                Best player who wonned most guessGame is: <?php echo $_SESSION['wonguessMost']?><br><br>
                                Best player who wonned most rockpaperscissors is: <?php echo $_SESSION['wonrockMost']?><br><br>
                                Best player who wonned most frogJump is: <?php echo $_SESSION['wonfrogMost']?><br><br>
                        </section>
                </main>
                <br>
                <footer>
                        A project by ME
                </footer>
        </body>
</html>
