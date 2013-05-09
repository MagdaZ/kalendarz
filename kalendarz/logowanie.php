<?php

require_once 'website.php';
$homepage = new Website();
$db = new SQLite3('cal/common/database.sqlite');

session_start();

if (isset($_POST['wyloguj'])) {
	session_destroy();
	$homepage -> content .= '
	<script type="text/javascript">
	alert ("Zostales wylogowany.");
	</script>';
}

if (!isset($_SESSION['zalogowany'])) {
			
		if (isset($_POST['wyslij'])) {
		$result = $db -> Query("SELECT PersonId FROM Persons WHERE Mail = '" . $_POST['login'] . "'");

		if ($r = $result -> fetchArray()) {

			$_SESSION['zalogowany'] = true;
			$_SESSION['login'] = $_POST['login'];
			$homepage -> content .= '
			<script type="text/javascript">
			alert ("Jestes zalogowany.");
			</script>';
		} else {
			$homepage -> content .= '
		<script type="text/javascript">
		alert ("Nie ma takiego uzytkownika.");
		</script>';
		}
	}
}

if (isset($_SESSION['zalogowany'])) {
	$homepage -> content .= 'Witam, ' . $_SESSION['login'];
	$homepage -> content .= '<div id="content">
	<form method="POST" action="logowanie.php">
	<input type="submit" value="Wyloguj" name="wyloguj">
	</form>  </div>';
} else {
	$homepage -> content .= '<script type="text/javascript">
	alert ("Aby sie zalogowac podaj adres email.");
	</script>';
	$homepage -> content .= '<div id="content">
	<form method="POST" action="logowanie.php">
	<b>nazwa uzytkownika:</b> <input type="text" name="login"><br>
	<input type="submit" value="Wyslij" name="wyslij"></div>';
}

	
$homepage -> viewWebsite();

?>
