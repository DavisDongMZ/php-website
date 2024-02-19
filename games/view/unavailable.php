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
nav {
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
				<li> <a href=?operation=allstats>All Stats</a> </li>
				<li> <a href=?operation=guessGame>Guess Game</a> </li>
				<li> <a href=?operation=rockPaperScissors>Rock Paper Scissors</a> </li>
                                <li  class='active'> <a href=?operation=frogs>Frogs</a> </li>
                                <li> <a href=?operation=profiles>Profile</a> </li>
                                <li> <a href=?operation=logout>Logout</a> </li>   
                        	</ul>
		</nav>
		</header>
		<main>
			<section>
				<h1>Unavailable</h1>
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
				game goes here
			</section>
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

