<?php
require_once 'website.php';
session_start();
class Calendar extends Website {//nowa klasa dziedzicz±ca po Website
	public function viewJS()//funkcja wy¶›wietlaj±ca JavaScript
	{
		echo "<script src=\"cal/codebase/dhtmlxscheduler.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_limit.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_year_view.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		//echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_agenda_view.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_week_agenda.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_cookie.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_recurring.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/codebase/ext/dhtmlxscheduler_pdf.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<script src=\"cal/translate_pl.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
		echo "<style type=\"text/css\" media=\"screen\">
						html, body{
						margin:0px;
						padding:0px;
						height:100%;
						}	
			
				 </style>

				<script type=\"text/javascript\" charset=\"utf-8\">
				
					function init() {
		
					scheduler.config.xml_date=\"%Y-%m-%d %H:%i\";
					scheduler.config.prevent_cache = true;
		
					//zaznaczanie aktualnego czasu czerwon± lini±
					scheduler.config.multi_day = true; 
					scheduler.config.mark_now = true;
		
					//agenda tygodniowa
					scheduler.config.time_step = 15;
    				scheduler.locale.labels.week_agenda_tab = \"Agenda\";
					scheduler.templates.week_agenda_event_text = function(start_date, end_date, event, date, position) {
					switch(position){
					case \"middle\":
						return \"-- \" + event.text;
					case \"end\":
						return \"End: \"+scheduler.templates.event_date(start_date) + \" \" + event.text;
					case \"start\":
						return \"Start: \"+scheduler.templates.event_date(start_date) + \" \" + event.text;
					default:
						return scheduler.templates.event_date(start_date) + \" \" + event.text;
					}
					};
		
					//dodawanie wydarzenia
					scheduler.config.lightbox.sections=[	
						{name:\"description\", height:130, map_to:\"text\", type:\"textarea\" , focus:true},
						{name:\"location\", height:43, type:\"textarea\", map_to:\"details\" },
						{name:\"recurring\", height:115, type:\"recurring\", map_to:\"rec_type\", button:\"recurring\"},
						{name:\"time\", height:72, type:\"time\", map_to:\"auto\"}
					
						]
					scheduler.config.first_hour=4;
					scheduler.locale.labels.section_location=\"Miejsce\";
					
					
					//wydarzenie ca³odniowe
					scheduler.config.details_on_create=true;
					scheduler.config.details_on_dblclick=true;
					scheduler.config.full_day = true;
		
					
					//wy¶wietlanie widoku startowego z danymi z bazy
					scheduler.init(\"scheduler_here\",null,\"week\"); 
					scheduler.setLoadMode(\"month\")
					
					scheduler.load(\"cal/data/events_rec.php\");
					var dp = new dataProcessor(\"cal/data/events_rec.php\");
					dp.init(scheduler);

					}
					</script>";
	}

	public function viewWebsite()//nadpisana funkcja wy¶wietlaj±ca ca³± stronê
	{
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
		echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-2\" />";
		$this -> viewTitle();
		$this -> viewKeywords();
		$this -> viewCss();
		$this -> viewJS();
		echo "</head>\n<body onload=\"init();\">";
		$this -> viewHeader();
		//$this->viewMenu($this->menu);
		echo $this -> content;
		$this -> viewFooter();
		echo "</body>\n</html>\n";
	}

}
$homepage = new Calendar();
	
if (isset($_SESSION['zalogowany'])) {
	
	$homepage -> content = '
		
		<div id="scheduler_here" class="dhx_cal_container" style="width:100%; height:100%;">
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			
			<input type="button" name="PDF" value="PDF" onclick="scheduler.toPDF(\'http://dhtmlxscheduler.appspot.com/export/pdf\')" style="position:absolute; right:472px; top:0px;">
		
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
			<div class="dhx_cal_tab" name="year_tab" style="right:268px;"></div>
			
				<div class="dhx_cal_tab" name="week_agenda_tab" style="right:332px;"></div>
	
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>		
	</div>


	';
} else {
	$homepage -> content .= '<div id="content">Z kalendarza moga korzystac tylko zalogowani uzytkownicy.</div>';
}

$homepage -> viewWebsite();
?>