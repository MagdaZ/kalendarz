<?php

require_once 'website.php';
require_once 'editAddressBook.php';
$homepage = new Website();
//nawiazanie polaczenia z baza danych
$db = new SQLite3('kalendarz.db');
$edit = new editAddressBook();


//dodawania nowych uzytkownikow lub edycja w zaleznosci od danych wprowadzonych do formularza
if (isset($_POST['editId'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$position = $_POST['position'];
	$id = $_POST['editId'];
	if ($id == '') {
		$edit -> addPerson($name, $surname, $email, $position, $db);
		$homepage -> content .= '
		<script type="text/javascript">
		alert ("Dodano nowa osobe do ksiazki adresowej.");
		</script>
		';
	} else {
		$edit -> editPerson($name, $surname, $email, $position, $id, $db);
		$homepage -> content .= '
		<script type="text/javascript">
		alert ("Dane osoby zostaly zmienione.");
		</script>
		';
	}
}
if (isset($_GET['delId'])) {
	$delId = $_GET['delId'];
	$edit -> delPerson($delId, $db);
	$homepage -> content .= '
	<script type="text/javascript">
	alert ("Usunieto osobe z ksiazki adresowej.");
	</script>
	';
}

$sortMethod = "PersonId";

if (isset($_GET['sort'])) {
	$sortMethod = $_GET['sort'];
}

$preparedQuery = $edit -> sort($sortMethod);

//pobranie wszystkich danych z tabeli Persons oraz wyswietlenie ich w formie tabeli

$result = $db -> Query("$preparedQuery");

$arrayContent = '<br/><br/>';
$arrayContent .= "<table class=\"center\" cellpadding=\"2\" border=1>";

//dodanie naglowkow do tabeli
$arrayContent .= "<tr>";
$arrayContent .= "<td><b>" . "<a href=\"ksiazkaadresowa.php?sort=PersonId\">Id</a>" . "</b></td>";
$arrayContent .= "<td><b>" . "<a href=\"ksiazkaadresowa.php?sort=Surname\">Nazwisko</a>" . "</b></td>";
$arrayContent .= "<td><b>" . "<a href=\"ksiazkaadresowa.php?sort=Name\">Imie</a>" . "</b></td>";
$arrayContent .= "<td><b>" . "<a href=\"ksiazkaadresowa.php?sort=Mail\">Mail</a>" . "</b></td>";
$arrayContent .= "<td><b>" . "<a href=\"ksiazkaadresowa.php?sort=Position\">Stanowisko</a>" . "</b></td>";
$arrayContent .= "<td><b>" . "Usuwanie" . "</b></td>";
$arrayContent .= "</tr>";

//pobranie w petli kolejnych rekordow z bazy danych i ich wyswietlenie
while ($r = $result -> fetchArray()) {
	$arrayContent .= "<tr>";
	$arrayContent .= "<td>" . $r['PersonId'] . "</td>";
	$arrayContent .= "<td>" . $r['Surname'] . "</td>";
	$arrayContent .= "<td>" . $r['Name'] . "</td>";
	$arrayContent .= "<td>" . $r['Mail'] . "</td>";
	$arrayContent .= "<td>" . $r['Position'] . "</td>";
	$PersonId = $r['PersonId'];
	//odnosnik przekierowujacy do edycji danych, ktory umozliwia usuniecie rekordu
	$arrayContent .= "<td>" . "<a href=\"ksiazkaadresowa.php?delId=$PersonId\">Usun</a>" . "</td>";
	$arrayContent .= "</td>";
	$arrayContent .= "</tr>";
}
$arrayContent .= "</table>";

//dopisanie zawartosci tabeli do zmiennej, ktora jest wyswietlana na stronie
$homepage -> content .= $arrayContent;
$homepage -> content .= '

<script type="text/javascript">
<!-- Ukrycie przed przeglądarkami nieobsługującymi JavaScriptu
function przetwarzaj_dane (){
  var brakuje_danych = false;
  var formularz = document.forms[0];
  var napis = "";
  if(formularz.surname.value == ""){
    napis += "-nie wypelniono pola nazwisko\n"  
    brakuje_danych = true;
  }
  if(formularz.name.value == ""){
    napis += "-nie wypelniono pola imie\n"  
    brakuje_danych = true;
  }
  if(formularz.email.value == ""){
    napis += "-nie wypelniono pola email\n"
    brakuje_danych = true;
  }
  if(formularz.position.value == ""){
    napis += "-nie wypelniono pola stanowisko\n"
    brakuje_danych = true;
  }
  if(!brakuje_danych)
    formularz.submit();
  else
    alert ("Formularz nie zostal wypelniony poprawnie:\n" + napis);
    return false;
}
// Koniec kodu JavaScript -->
</script>

<div id="content">
</br>
<form method="post" action="ksiazkaadresowa.php">
<table class="tableStyleClassTwo">
<tr><td>Nazwisko:</td><td><div align="left">
<input type="text" name="surname" />
</div></td></tr>
<tr><td>Imie:</td><td><div align="left">
<input type="text" name="name" />
</div></td></tr>
<tr><td>Email:</td><td><div align="left">
<input type="text" name="email" />
</div></td></tr>
<tr><td>Stanowisko:</td><td><div align="left">
<input type="text" name="position" />
</div></td></tr>
<tr><td>Id (w przypadku edycji):</td><td><div align="left">
<input type="number" name="editId" />
</div></td></tr>
<tr><td colspan="2" align="center"><input type = "submit" name ="send" value = "Wyslij" onClick = "return przetwarzaj_dane()"></td></tr>
<input type="hidden" name="mode" value="added">
</table>
</div>';
$homepage -> viewWebsite();
?>