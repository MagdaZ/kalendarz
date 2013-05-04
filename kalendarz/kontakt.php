<?php
    require_once 'website.php';
	
	
	$homepage=new Website();
	$homepage->content='<div id="content">
	<h2>Kontakt</h2>
	<p>Magdalena Zachwieja - <a href="mailto:magda.zachwieja@gmail.com">magda.zachwieja@gmail.com</a></p>
	<p>Michal Oczko - <a href="mailto:michal.oczko.gmail.com">michal.oczko.gmail.com</a></p>
	<p>Krzysztof Bednarz - <a href="mailto:ka.bednarz@gmail.com">ka.bednarz@gmail.com</a></p>
	</div>';
	$homepage->viewWebsite();
?>