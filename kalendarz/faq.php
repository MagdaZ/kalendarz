<?php
    require_once 'website.php';
	$homepage=new Website();
	$homepage->content='<div id="content">
	<h2>Regulamin</h2>
	<p>
	1. Strona jest w�asno�ci� firmy BOZ Sp. z o.o. <br/>
	2. Kalendarz i ksi��ka adresowa s�� dost�pne tylko po zalogowaniu wy���cznie dla pracownik�w firmy BOZ Sp. z o.o. 
	Pozosta�e podstrony s�� og�lnodost�pne.<br/>
	3. Korzystaj�c z naszej strony zgadzasz si� na nasz� polityk� prywatno�ci.<br/>
	4. W razie pyta� skontaktuj si� z nami. Nasze maile znajdziesz w zak�adce Kontakt.<br/>
	</p>
	<h2>Polityka prywatno�ci</h2>
	<p>1. Cookies (tzw. ciasteczka) to niewielkie informacje tekstowe, wysy�ane przez serwer www i zapisywane po stronie u�ytkownika 
	(najcz�ciej w pliku tekstowym lub binarnym). Domy�lne parametry ciasteczek pozwalaj� na odczytanie informacji w nich zawartych 
	jedynie serwerowi, kt�ry je utworzy�. Cookies mog� zawiera� r�ne informacje o u�ytkowniku danej strony WWW i historii jego ��czno�ci 
	z dan� stron� (a w�a�ciwie serwerem). <br/>
	2. Cookies wykorzystywane s�:<br/>
	a) do dostosowania zawarto�ci stron www do preferencji u�ytkownika oraz optymalizacji korzystania ze stron internetowych;<br/>
	b) do tworzenia statystyk, kt�re pomagaj� zrozumie�, w jaki spos�b u�ytkownicy  korzystaj� ze stron www, co jest przydatne przy  
	ulepszaniu ich struktury i zawarto�ci;<br/>
	c) do utrzymania sesji u�ytkownika serwisu (po zalogowaniu), dzi�ki kt�rej u�ytkownik nie musi na ka�dej podstronie ponownie wpisywa� 
	loginu i has�a. <br/>
	3. Cookies innych podmiot�w.<br/>
	W reklamach i widgetach zamieszczanych na stronach  mog� by� wykorzystywane cookies podmiot�w trzecich (np. facebook).  Niniejsza 
	Polityka Prywatno�ci nie reguluje zasad wykorzystania mechanizmu cookies przez podmioty trzecie.</p>
	</div>';
	$homepage->viewWebsite();
?>