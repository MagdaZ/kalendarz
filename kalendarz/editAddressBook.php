<?php

class editAddressBook {

	public function addPerson($name, $surname, $email, $position, $db) {
		$db -> exec("INSERT INTO Persons (Name, Surname, Mail, Position) VALUES ('$name','$surname', '$email', '$position')");
	}

	public function editPerson($name, $surname, $email, $position, $id, $db) {
		$db -> exec("UPDATE Persons SET Name = '$name' , Surname= '$surname' , Mail= '$email' , Position= '$position'  WHERE PersonId = '$id'");
	}

	public function delPerson($delId, $db) {
		$db -> exec("UPDATE Persons SET Position='Usunieto' WHERE PersonId = '$delId'");
		//Poniżej metoda pozwalazjaca usuwac rekordy z bazy danych
		//$db -> exec("DELETE FROM Persons WHERE PersonId = '$delId' ");
	}

	public function sort($sortMethod) {
		return "SELECT * FROM Persons ORDER BY " . $sortMethod . " ASC";
	}

}
?>