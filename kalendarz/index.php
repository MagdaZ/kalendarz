<?php
    require_once 'website.php';
	$homepage=new Website();
	$homepage->content='<div id="content">
	<h2>Witamy na stronie naszej firmy.</h3>
	<p>Jeste�my firm� �wiadcz�c� szeroki zakres us�ug. Ta strona jest nasz� wizyt�wk�. Wkr�tce znajd� si� tutaj szczeg�y naszej oferty. </p>
	<p>Kalendarz i ksi��ka adresowa s� dost�pne tylko po zalogowaniu dla pracownik�w naszej firmy!!!</p><br/><br/><br/>
	<p>Ta strona wraz z aplikcjami ksi��ka adresowa i kalendarz zosta�a wykonana w ramach projektu na studiach podyplomowych 
	"Informatyka-Projektowanie i eksploatacja system�w informatycznych"</p>
	<p>Sk�ad zespo�u:</p>
	<p>Magdalena Zachwieja - boss</p>
	<p>Micha� Oczko - mniejszy boss</p>
	<p>Krzysztof Bednarz - mniejszy boss</p>
	</div>';
	
	$homepage->viewWebsite();
?>