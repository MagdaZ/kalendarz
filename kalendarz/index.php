<?php
    require_once 'website.php';
	$homepage=new Website();
	$homepage->content='<div id="content">
	<h2>Witamy na stronie naszej firmy.</h3>
	<p>Jeste¶my firm± ¶wiadcz±c± szeroki zakres us³ug. Ta strona jest nasz± wizytówk±. Wkrótce znajd± siê tutaj szczegó³y naszej oferty. </p>
	<p>Kalendarz i ksi±¿ka adresowa s± dostêpne tylko po zalogowaniu dla pracowników naszej firmy!!!</p><br/><br/><br/>
	<p>Ta strona wraz z aplikcjami ksi±¿ka adresowa i kalendarz zosta³a wykonana w ramach projektu na studiach podyplomowych 
	"Informatyka-Projektowanie i eksploatacja systemów informatycznych"</p>
	<p>Sk³ad zespo³u:</p>
	<p>Magdalena Zachwieja - boss</p>
	<p>Micha³ Oczko - mniejszy boss</p>
	<p>Krzysztof Bednarz - mniejszy boss</p>
	</div>';
	
	$homepage->viewWebsite();
?>