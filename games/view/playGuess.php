<?php
	// So I don't have to deal with uninitialized $_REQUEST['guess']
	$_REQUEST['guess']=!empty($_REQUEST['guess']) ? $_REQUEST['guess'] : '';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Guess Game</title>
<style>
body {
	margin: 10px;
	border: 1px solid gray;
}

h1{
    margin-left: 10px;
    margin-top: 50px;
}

footer{
    margin-top: 20px;
    text-align: center;
    margin-bottom: 5px;
}

header {
	margin-top: 15px;
	margin-left: 5px;
	margin-right: 6px;
}
section {
    margin-left: 10px;
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
  margin-bottom: auto;
  width: 16.3%;
  justify-content: center;
  margin-right: 3px;
  margin-left:2px;
  height: 93%;
}

nav a {
  padding-top: 5px;
  height: 98%;
  text-decoration: none;
  color: white; 
  background-color: black; /* Set background color for each navigation bar */
  display: block; /* Make the entire area clickable */
  text-align: center;
}

nav li.active a{
	background-color: white;
	color: black;
	border: 1.5px solid black;
	height: 93%;
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

.guess-game-container {
        margin-left: 10px; 
}


</style>
	</head>
	<body>
    <header>
		<nav>
				<ul>
				<li> <a href=?operation=allstats>All Stats</a> </li>
				<li class='active'> <a href=?operation=guessGame>Guess Game</a> </li>
				<li> <a href=?operation=rockPaperScissors>Rock Paper Scissors</a> </li>
                                <li> <a href=?operation=frogs>Frogs</a> </li>
                                <li> <a href=?operation=profiles>Profile</a> </li>
                                <li> <a href=?operation=logout>Logout</a> </li>       
		</ul>
		</nav>
	</header>
	<div class="guess-game-container">
		<h1>GuessGame</h1>
		<?php if($_SESSION["GuessGame"]->getState()!="correct"){ ?>
			<form method="post">
				<input type="text" name="guess" value="<?php echo($_REQUEST['guess']); ?>" /> <input type="submit" name="submit" value="guess" />
			</form>
		<?php } ?>
		
		<?php echo(view_errors($errors)); ?> 

		<?php 
			foreach($_SESSION['GuessGame']->history as $key=>$value){
				echo("<br/> $value");
			}
			if($_SESSION["GuessGame"]->getState()=="correct"){ 
				?>
						<form method="post">
							<input type="submit" name="submit" value="start again" />
						</form>
				<?php 
					} 
				?>
		</div>
			<main>
                <section class='stats'>
				<h1>Stats</h1>
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
				stats go here
			</section>
		</main>
		<br>
		<footer>
			A project by ME
		</footer>
	</body>
</html>
