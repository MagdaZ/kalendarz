/*
This software is allowed to use under GPL or you need to obtain Commercial or Enterise License
to use it in non-GPL project. Please contact sales@dhtmlx.com for details
*/
scheduler.config.year_x=4;scheduler.config.year_y=3;scheduler.config.year_mode_name="year";scheduler.xy.year_top=0;scheduler.templates.year_date=function(c){return scheduler.date.date_to_str(scheduler.locale.labels.year_tab+" %Y")(c)};scheduler.templates.year_month=scheduler.date.date_to_str("%F");scheduler.templates.year_scale_date=scheduler.date.date_to_str("%D");scheduler.templates.year_tooltip=function(c,q,n){return n.text};
(function(){var c=function(){return scheduler._mode==scheduler.config.year_mode_name};scheduler.dblclick_dhx_month_head=function(b){if(c()){var a=b.target||b.srcElement;if(a.parentNode.className.indexOf("dhx_before")!=-1||a.parentNode.className.indexOf("dhx_after")!=-1)return!1;var j=this.templates.xml_date(a.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute("date"));j.setDate(parseInt(a.innerHTML,10));var k=this.date.add(j,1,"day");!this.config.readonly&&this.config.dblclick_create&&
this.addEventNow(j.valueOf(),k.valueOf(),b)}};var q=scheduler.changeEventId;scheduler.changeEventId=function(){q.apply(this,arguments);c()&&this.year_view(!0)};var n=scheduler.render_data,v=scheduler.date.date_to_str("%Y/%m/%d"),w=scheduler.date.str_to_date("%Y/%m/%d");scheduler.render_data=function(b){if(!c())return n.apply(this,arguments);for(var a=0;a<b.length;a++)this._year_render_event(b[a])};var x=scheduler.clear_view;scheduler.clear_view=function(){if(!c())return x.apply(this,arguments);for(var b in l)if(l.hasOwnProperty(b)){var a=
l[b];a.className="dhx_month_head";a.setAttribute("date","")}l={}};scheduler.hideToolTip=function(){if(this._tooltip)this._tooltip.style.display="none",this._tooltip.date=new Date(9999,1,1)};scheduler.showToolTip=function(b,a,j,k){if(this._tooltip){if(this._tooltip.date.valueOf()==b.valueOf())return;this._tooltip.innerHTML=""}else{var g=this._tooltip=document.createElement("DIV");g.className="dhx_year_tooltip";document.body.appendChild(g);g.onclick=scheduler._click.dhx_cal_data}for(var h=this.getEvents(b,
this.date.add(b,1,"day")),c="",e=0;e<h.length;e++){var m=h[e],d=m.color?"background:"+m.color+";":"",f=m.textColor?"color:"+m.textColor+";":"";c+="<div class='dhx_tooltip_line' style='"+d+""+f+"' event_id='"+h[e].id+"'>";c+="<div class='dhx_tooltip_date' style='"+d+""+f+"'>"+(h[e]._timed?this.templates.event_date(h[e].start_date):"")+"</div>";c+="<div class='dhx_event_icon icon_details'>&nbsp;</div>";c+=this.templates.year_tooltip(h[e].start_date,h[e].end_date,h[e])+"</div>"}this._tooltip.style.display=
"";this._tooltip.style.top="0px";this._tooltip.style.left=document.body.offsetWidth-a.left-this._tooltip.offsetWidth<0?a.left-this._tooltip.offsetWidth+"px":a.left+k.offsetWidth+"px";this._tooltip.date=b;this._tooltip.innerHTML=c;this._tooltip.style.top=document.body.offsetHeight-a.top-this._tooltip.offsetHeight<0?a.top-this._tooltip.offsetHeight+k.offsetHeight+"px":a.top+"px"};scheduler._init_year_tooltip=function(){dhtmlxEvent(scheduler._els.dhx_cal_data[0],"mouseover",function(b){if(c()){var b=
b||event,a=b.target||b.srcElement;if(a.tagName.toLowerCase()=="a")a=a.parentNode;(a.className||"").indexOf("dhx_year_event")!=-1?scheduler.showToolTip(w(a.getAttribute("date")),getOffset(a),b,a):scheduler.hideToolTip()}});this._init_year_tooltip=function(){}};scheduler.attachEvent("onSchedulerResize",function(){return c()?(this.year_view(!0),!1):!0});scheduler._get_year_cell=function(b){var a=b.getMonth()+12*(b.getFullYear()-this._min_date.getFullYear())-this.week_starts._month,j=this._els.dhx_cal_data[0].childNodes[a],
b=this.week_starts[a]+b.getDate()-1;return j.childNodes[2].firstChild.rows[Math.floor(b/7)].cells[b%7].firstChild};var l={};scheduler._mark_year_date=function(b,a){var j=v(b),c=this._get_year_cell(b),g=this.templates.event_class(a.start_date,a.end_date,a);if(!l[j])c.className="dhx_month_head dhx_year_event",c.setAttribute("date",j),l[j]=c;c.className+=g?" "+g:""};scheduler._unmark_year_date=function(b){this._get_year_cell(b).className="dhx_month_head"};scheduler._year_render_event=function(b){for(var a=
b.start_date,a=a.valueOf()<this._min_date.valueOf()?this._min_date:this.date.date_part(new Date(a));a<b.end_date;)if(this._mark_year_date(a,b),a=this.date.add(a,1,"day"),a.valueOf()>=this._max_date.valueOf())break};scheduler.year_view=function(b){if(b){var a=scheduler.xy.scale_height;scheduler.xy.scale_height=-1}scheduler._els.dhx_cal_header[0].style.display=b?"none":"";scheduler.set_sizes();if(b)scheduler.xy.scale_height=a;scheduler._table_view=b;if(!this._load_mode||!this._load())if(b){scheduler._init_year_tooltip();
scheduler._reset_year_scale();if(scheduler._load_mode&&scheduler._load())return scheduler._render_wait=!0;scheduler.render_view_data()}else scheduler.hideToolTip()};scheduler._reset_year_scale=function(){this._cols=[];this._colsS={};var b=[],a=this._els.dhx_cal_data[0],c=this.config;a.scrollTop=0;a.innerHTML="";var k=Math.floor(parseInt(a.style.width)/c.year_x),g=Math.floor((parseInt(a.style.height)-scheduler.xy.year_top)/c.year_y);g<190&&(g=190,k=Math.floor((parseInt(a.style.width)-scheduler.xy.scroll_width)/
c.year_x));for(var h=k-11,l=0,e=document.createElement("div"),m=this.date.week_start(scheduler._currentDate()),d=0;d<7;d++)this._cols[d]=Math.floor(h/(7-d)),this._render_x_header(d,l,m,e),m=this.date.add(m,1,"day"),h-=this._cols[d],l+=this._cols[d];e.lastChild.className+=" dhx_scale_bar_last";for(var f=this.date[this._mode+"_start"](this.date.copy(this._date)),n=f,d=0;d<c.year_y;d++)for(var r=0;r<c.year_x;r++){var i=document.createElement("DIV");i.style.cssText="position:absolute;";i.setAttribute("date",
this.templates.xml_format(f));i.innerHTML="<div class='dhx_year_month'></div><div class='dhx_year_week'>"+e.innerHTML+"</div><div class='dhx_year_body'></div>";i.childNodes[0].innerHTML=this.templates.year_month(f);for(var q=this.date.week_start(f),t=this._reset_month_scale(i.childNodes[2],f,q),o=i.childNodes[2].firstChild.rows,p=o.length;p<6;p++){o[0].parentNode.appendChild(o[0].cloneNode(!0));for(var s=0;s<o[p].childNodes.length;s++)o[p].childNodes[s].className="dhx_after",o[p].childNodes[s].firstChild.innerHTML=
scheduler.templates.month_day(t),t=scheduler.date.add(t,1,"day")}a.appendChild(i);i.childNodes[1].style.height=i.childNodes[1].childNodes[0].offsetHeight+"px";var u=Math.round((g-190)/2);i.style.marginTop=u+"px";this.set_xy(i,k-10,g-u-10,k*r+5,g*d+5+scheduler.xy.year_top);b[d*c.year_x+r]=(f.getDay()-(this.config.start_on_monday?1:0)+7)%7;f=this.date.add(f,1,"month")}this._els.dhx_cal_date[0].innerHTML=this.templates[this._mode+"_date"](n,f,this._mode);this.week_starts=b;b._month=n.getMonth();this._min_date=
n;this._max_date=f}})();
