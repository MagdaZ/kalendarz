<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>kalendarz</title>
</head>
	<script src="cal/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<script src="cal/codebase/ext/dhtmlxscheduler_limit.js" type="text/javascript" charset="utf-8"></script>
	<script src="cal/codebase/ext/dhtmlxscheduler_year_view.js" type="text/javascript" charset="utf-8"></script>
	<script src="cal/codebase/ext/dhtmlxscheduler_agenda_view.js" type="text/javascript" charset="utf-8"></script>
	<script src="cal/codebase/ext/dhtmlxscheduler_pdf.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="cal/codebase/dhtmlxscheduler.css" type="text/css" title="no title" charset="utf-8">

	
<style type="text/css" media="screen">
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}	
</style>

<script type="text/javascript" charset="utf-8">
	function init() {
		
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.prevent_cache = true;
		
		//zaznaczanie aktualnego czasu czerwoną linią
		scheduler.config.multi_day = true; 
		scheduler.config.mark_now = true;
		
		//dodawanie wydarzenia
		scheduler.config.lightbox.sections=[	
			{name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
			{name:"location", height:43, type:"textarea", map_to:"details" },
			{name:"time", height:72, type:"time", map_to:"auto"}
		]
		scheduler.config.first_hour=4;
		scheduler.locale.labels.section_location="Location";
		
		//wydarzenie całodniowe
		scheduler.config.details_on_create=true;
		scheduler.config.details_on_dblclick=true;
		scheduler.config.full_day = true;
		

		//wyświetlanie widoku startowego z danymi z bazy
		scheduler.init('scheduler_here',null,"week"); 
		scheduler.setLoadMode("month")
		scheduler.load("cal/data/events.php");
		
		var dp = new dataProcessor("cal/data/events.php");
		dp.init(scheduler);

	}
</script>

</head>
<body onload="init();">
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			
			<input type="button" name="PDF" value="PDF" onclick="scheduler.toPDF('http://dhtmlxscheduler.appspot.com/export/pdf')" style='position:absolute; right:472px; top:0px;'>
			
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
			<div class="dhx_cal_tab" name="year_tab" style="right:330px;"></div>
			<div class="dhx_cal_tab" name="agenda_tab" style="right:265px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>		
	</div>
</body>