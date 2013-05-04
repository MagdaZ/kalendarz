<?php
    require_once 'website.php';
	$homepage=new Website();
	$homepage->content='<div id="content">
	<h2>Regulamin</h2>
	<p>
	1. Strona jest w³asno¶ci± firmy BOZ Sp. z o.o. <br/>
	2. Kalendarz i ksi±¿ka adresowa s±… dostê™pne tylko po zalogowaniu wy³±…cznie dla pracowników firmy BOZ Sp. z o.o. 
	Pozosta³e podstrony s±… ogólnodostêpne.<br/>
	3. Korzystaj±c z naszej strony zgadzasz siê na nasz± politykê prywatno¶ci.<br/>
	4. W razie pytañ skontaktuj siê z nami. Nasze maile znajdziesz w zak³adce Kontakt.<br/>
	</p>
	<h2>Polityka prywatno¶ci</h2>
	<p>1. Cookies (tzw. ciasteczka) to niewielkie informacje tekstowe, wysy³ane przez serwer www i zapisywane po stronie u¿ytkownika 
	(najczê¶ciej w pliku tekstowym lub binarnym). Domy¶lne parametry ciasteczek pozwalaj± na odczytanie informacji w nich zawartych 
	jedynie serwerowi, który je utworzy³. Cookies mog± zawieraæ ró¿ne informacje o u¿ytkowniku danej strony WWW i historii jego ³±czno¶ci 
	z dan± stron± (a w³a¶ciwie serwerem). <br/>
	2. Cookies wykorzystywane s±:<br/>
	a) do dostosowania zawarto¶ci stron www do preferencji u¿ytkownika oraz optymalizacji korzystania ze stron internetowych;<br/>
	b) do tworzenia statystyk, które pomagaj± zrozumieæ, w jaki sposób u¿ytkownicy  korzystaj± ze stron www, co jest przydatne przy  
	ulepszaniu ich struktury i zawarto¶ci;<br/>
	c) do utrzymania sesji u¿ytkownika serwisu (po zalogowaniu), dziêki której u¿ytkownik nie musi na ka¿dej podstronie ponownie wpisywaæ 
	loginu i has³a. <br/>
	3. Cookies innych podmiotów.<br/>
	W reklamach i widgetach zamieszczanych na stronach  mog± byæ wykorzystywane cookies podmiotów trzecich (np. facebook).  Niniejsza 
	Polityka Prywatno¶ci nie reguluje zasad wykorzystania mechanizmu cookies przez podmioty trzecie.</p>
	</div>';
	$homepage->viewWebsite();
?>