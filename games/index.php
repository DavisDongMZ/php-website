<?php
	ini_set('display_errors', 'On');
	require_once "lib/lib.php";
	require_once "model/GuessGame.php";
	require_once "model/rockpaperscissors.php";
	require_once "model/frogJump.php";

	session_save_path("sess");
	session_start(); 

	$dbconn = db_connect();

	$errors=array();
	$view="";

	/* controller code */

	/* local actions, these are state transforms */
	if(!isset($_SESSION['state'])){
		$_SESSION['state']='login';
	}

	if(!isset($_SESSION['operation'])){
                $_SESSION['operation']='';
        }

function handleOperations() {
	if(isset($_REQUEST['operation'])){                
		if ($_REQUEST['operation']=="logout"){
			$_SESSION["state"]="login";
			$view="login.php";
		} elseif ($_REQUEST['operation']=="frogs"){
			$_SESSION["state"]= "frogs";
			$view = "playFrog.php"; 
		} elseif ($_REQUEST['operation']=="profiles"){
			$_SESSION["state"]= "profiles";
			$view = "profiles.php";
		} elseif ($_REQUEST['operation']=="guessGame"){
			$_SESSION["state"]= "playGuess";
			$view = "playGuess.php";
		} elseif ($_REQUEST['operation']=="rockPaperScissors"){
			$_SESSION['state']="rockPaperScissors";
			$view = "playRock.php";
		} elseif ($_REQUEST['operation'] == "allstats"){
			$_SESSION['state']="allStats";
			$view = "AllStats.php";
		}
		$_REQUEST['operation']="";
	}		
}

	switch($_SESSION['state']){
		
		
		case "login":
			// the view we display by default
			$view="login.php";

			if(isset($_REQUEST['operation']) && $_REQUEST['operation']=="register"){
				$_SESSION['state']='register';
				$view = "register.php";
			}

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="login"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user']))$errors[]='user is required';
			if(empty($_REQUEST['password']))$errors[]='password is required';
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			if(!$dbconn){
				$errors[]="Can't connect to db";
				break;
			}
			$query = "SELECT * FROM appuser WHERE userid=$1 and password=$2;";
                	$result = pg_prepare($dbconn, "", $query);

                	$result = pg_execute($dbconn, "", array($_REQUEST['user'], md5($_REQUEST['password'])));
                	if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				$_SESSION['user']=$_REQUEST['user'];
				$_SESSION['state']='allStats';
				$_SESSION['GuessGame'] = new GuessGame();
				$_SESSION['rockGame'] = new rockGame();
				$_SESSION['frogGame'] = new frogGame();
				$view="AllStats.php";
			} else {
				$errors[]="invalid login";
			}
			break;

		case "register":
			$view = "register.php";

			if(isset($_REQUEST['submit'])&&$_REQUEST['submit']=="back To login"){
				$_SESSION['state']="login";
				$view = "login.php";
				break;
			}

			$display_errors_setting = ini_get('display_errors');
			ini_set('display_errors', 'Off');

			if(empty($_REQUEST['userid'])||empty($_REQUEST['passwd'])){
				$errors[]='username and password are required';
				break;
			}

			if (strlen($_REQUEST['comments'])>20){
				$errors[]='comment is too long!';
				break;
			}
			$games = !empty($_REQUEST['games']) ? implode(',', $_REQUEST['games']) : '';
			$query = "INSERT INTO appuser (userid, password, gender, games, age, birthday, comments)
			VALUES ($1, $2, $3, $4, $5, $6, $7);";
  			$result = pg_prepare($dbconn, "", $query);
  			$result = pg_execute($dbconn, "", array(
	  			$_REQUEST['userid'],
	  			md5($_REQUEST['passwd']),
	  			$_REQUEST['gender'],
	  			$games, 
	  			$_REQUEST['age'],
	  			$_REQUEST['birthday'],
	  			$_REQUEST['comments']
  			));

			$query = "INSERT INTO wonFrogGame values ($1, 0)";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_REQUEST['userid']));

			$query = "INSERT INTO wonguessgame values ($1, 0)";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_REQUEST['userid']));

			$query = "INSERT INTO wonrockgame values ($1, 0)";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_REQUEST['userid']));

			ini_set('display_errors', $display_errors_setting);
			if ($result !== false) {
				$_SESSION['state']='login';
				$view = "login.php";
			} else {
				// Insertion failed
				$errors[]="user already exist";
				$view = "register.php";
			}
			break;

		case "profiles":
			$view = "profiles.php";
			handleOperations();
			$query = "SELECT * FROM appuser WHERE userid = $1";
        	$result = pg_prepare($dbconn, "", $query);
        	$result = pg_execute($dbconn, "", array($_SESSION['user']));
			$row = pg_fetch_assoc($result);

			$_SESSION['gender'] = $row['gender'];
            $_SESSION['games'] = $row['games'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['birthday'] = $row['birthday'];
            $_SESSION['comments'] = $row['comments'];

			break;
		
		case "frogs":

			//$view = ".php";
			$view="playFrog.php";
			handleOperations();
			switch(isset($_REQUEST['action']) ? $_REQUEST['action'] : ''){
				case 'yellowFrog':
					$_SESSION['frogGame']->movefrog('yellowFrog');
					break;
				case 'yellowFrog2':
					$_SESSION['frogGame']->movefrog('yellowFrog2');
					break;
				case 'yellowFrog3':
					$_SESSION['frogGame']->movefrog('yellowFrog3');
					break;
				case 'emptyPic':
					$_SESSION['frogGame']->movefrog('emptyPic');
					break;
				case 'greenFrog1':
					$_SESSION['frogGame']->movefrog('greenFrog1');
					break;
				case 'greenFrog2':
					$_SESSION['frogGame']->movefrog('greenFrog2');
					break;
				case 'greenFrog3':
					$_SESSION['frogGame']->movefrog('greenFrog3');
					break;
			}

			if(isset($_REQUEST['submit'])&& ($_REQUEST['submit']=="start again")){
				$_SESSION['frogGame']->reStart();
			}
			// perform operation, switching state and view if necessary
			if($_SESSION["frogGame"]->getState()=="win"){
				$_SESSION['state']="wonFrog";
				$view="wonFrog.php";
				$query3 = "UPDATE wonfroggame SET haswonnedfrog=haswonnedfrog+1 WHERE userid=$1";
				$result = pg_prepare($dbconn, "", $query3);
				$result = pg_execute($dbconn, "", array($_SESSION['user']));
			}

			break;

		case "wonFrog":

			$view="playFrog.php";
			handleOperations();
			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="start again"){
				$errors[]="Invalid request";
				$view="wonFrog.php";
			}

			// validate and set errors
			if(!empty($errors))break;


			// perform operation, switching state and view if necessary
			$_SESSION["frogGame"]=new frogGame();
			$_SESSION['state']="play";
			$view="playFrog.php";

			break;

		case "allStats":		
			$view="AllStats.php";
			handleOperations();

			$query = "SELECT haswonnedfrog FROM wonfroggame WHERE userid=$1";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_SESSION['user']));
			$row = pg_fetch_assoc($result);
			$_SESSION['haswonnedfrog'] = $row['haswonnedfrog'];

			$query = "SELECT haswonnedguess FROM wonguessgame WHERE userid=$1";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_SESSION['user']));
			$row = pg_fetch_assoc($result);
			$_SESSION['haswonnedguess'] = $row['haswonnedguess'];
			
			$query = "SELECT haswonnedrock FROM wonrockgame WHERE userid=$1";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_SESSION['user']));
			$row = pg_fetch_assoc($result);
			$_SESSION['haswonnedrock'] = $row['haswonnedrock'];

			$query = "SELECT userid FROM wonguessgame WHERE haswonnedguess = (SELECT MAX(haswonnedguess) FROM wonguessgame)";
			$result = pg_query($dbconn, $query);
			$row = pg_fetch_assoc($result);
			$_SESSION['wonguessMost'] = $row['userid'];

			$query = "SELECT userid FROM wonrockgame WHERE haswonnedrock = (SELECT MAX(haswonnedrock) FROM wonrockgame)";
			$result = pg_query($dbconn, $query);
			$row = pg_fetch_assoc($result);
			$_SESSION['wonrockMost'] = $row['userid'];

			$query = "SELECT userid FROM wonfroggame WHERE haswonnedfrog = (SELECT MAX(haswonnedfrog) FROM wonfroggame)";
			$result = pg_query($dbconn, $query);
			$row = pg_fetch_assoc($result);
			$_SESSION['wonfrogMost'] = $row['userid'];
			
			break;

		case "playGuess":
			
			$view="playGuess.php";
			handleOperations();
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="guess"){
					break;
			}
	
				
				// validate and set errors
				if(!is_numeric($_REQUEST["guess"]))$errors[]="Guess must be numeric.";
				if(!empty($errors))break;
	
				// perform operation, switching state and view if necessary
				$_SESSION["GuessGame"]->makeGuess($_REQUEST['guess']);
				
				if($_SESSION["GuessGame"]->getState()=="correct"){
					$_SESSION['state']="wonGuess";
					$view="wonGuess.php";
					$query1 = "UPDATE wonguessgame SET haswonnedguess=haswonnedguess+1 WHERE userid=$1";
					$result = pg_prepare($dbconn, "", $query1);
					$result = pg_execute($dbconn, "", array($_SESSION['user']));
				}
				$_REQUEST['guess']="";
				break;
	
			case "wonGuess":
				// the view we display by default
				$view="playGuess.php";
				handleOperations();
				// check if submit or not
				if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="start again"){
					$errors[]="Invalid request";
					$view="wonGuess.php";
				}
		
				// validate and set errors
				if(!empty($errors))break;
		
		
				// perform operation, switching state and view if necessary
				$_SESSION["GuessGame"]=new GuessGame();
				$_SESSION['state']="playGuess";
				$view="playGuess.php";
		
				break;

		case "rockPaperScissors":
			$view = "playRock.php";
			handleOperations();
			if(empty($_REQUEST['submit'])|| ($_REQUEST['submit']!="rock" && $_REQUEST['submit']!="scissor" && $_REQUEST['submit']!="paper")){
				break;
			}

			if(!empty($errors))break;

			$_SESSION["rockGame"]->makeGuess($_REQUEST['submit']);
			if($_SESSION["rockGame"]->getYouState()==5 || $_SESSION["rockGame"]->getIState()==5){
				if($_SESSION["rockGame"]->getYouState()==5){
					$query2 = "UPDATE wonrockgame SET haswonnedrock=haswonnedrock+1 WHERE userid=$1";
					$result = pg_prepare($dbconn, "", $query2);
					$result = pg_execute($dbconn, "", array($_SESSION['user']));
				}
				$_SESSION['state']="wonRock";
				$view="wonRock.php";
				
			}

			break;

		case "wonRock":
			$view="playRock.php";
			$query = "UPDATE wonguessgame SET haswonnedguess=haswonnedguess+1 WHERE userid=$1";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($_SESSION['user']));
			handleOperations();
			// check if submit or not
			if(empty($_REQUEST['submit'])|| ($_REQUEST['submit']!="yes" && $_REQUEST['submit']!="no")){
				$errors[]="Invalid request";
				$view="wonRock.php";
			}

			// validate and set errors
			if(!empty($errors))break;

			if ($_REQUEST['submit'] =="yes"){
				$_SESSION["rockGame"]=new rockGame();
				$_SESSION['state']="rockPaperScissors";
				$view="playRock.php";
			} else {
				$_SESSION['state']="login";
				$view="login.php";
			}

			break;	


	}
	require_once "view/$view";
?>

