<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorte.js"></script>
<script language="javascript" type="text/javascript" >
$(document).ready(function() {
	
   var p1;
	var p2;
	
var name = $('#name1').text();
		var	surname = $('#surname1').text();
		var	age = $('#age1').text();
		var	coach = $('#coacher1').text();
	var chart;	
	
	
	$('#moretime').click(function(){
   $('#mytable TR').click(function() {
	   if (!p1)
		   {
        p1 = convert($(this).children('td:eq(1)').text());
			   $('.1st').text($(this).children('td:eq(1)').text());
			   
			   return;
		   }
	   if (p1&&!p2)
		   {
			   p2 = convert($(this).children('td:eq(1)').text());
			   $('.2nd').text($(this).children('td:eq(1)').text());
		   }
   });
   });
   
   
$('#selectmode').click(function(){
	var sel1;
	var sel2;
	var globaldate21,globaltime21,globaldate22,globaltime22;
	var distance;
	document.getElementById("mytable").style.background="white";
	 $('#mytable TR').click(function() {
		 if(!sel1)
			 {
				 
				 sel1 = $(this).children('td:eq(2)').text();
				 globaldate21 = sel1;
				 globaltime21 = $(this).children('td:eq(1)').text();
				 distance = $(this).children('td:eq(0)').text();
				 this.style.backgroundColor = "red";
				 $('.1st').text(sel1);
				  return;
			 }
		 if (sel1&&!sel2)
		   {
			  sel2 = $(this).children('td:eq(2)').text();	
			   globaldate22 = sel2;
				 globaltime22 = $(this).children('td:eq(1)').text();
			   this.style.backgroundColor = "red";
			   $('.2nd').text(sel2);
			    var dataaa = []; 
	 
		$.ajax({
			type:'POST',
			url:'handlermy2.php',
			data:{fdate:sel1,sdate:sel2, distance:distance,name:name,surname:surname,age:age,coach:coach},
			success:function use(dattta)
			{
				var pattern0 = function(){ return dattta.split('#')[0].split('|'); },
            list = {
                one : {
                    date : pattern0(),
                    time : pattern0()
                }
            };
            for(i=0; i<list.one.date.length; i++){
                list.one.date[i] = list.one.date[i].split('*')[0];
                list.one.time[i] = list.one.time[i].split('*')[1];
            }
            
            
            dataaa = [];
			var obj = {};
			
			dataaa.push({x:globaldate21,y:globaltime21});
			for (i=0;i<list.one.date.length;i++)
				{
					if (list.one.time[i]!=null && list.one.time[i]!=' ')
						{
							obj = {x:list.one.date[i],y:list.one.time[i]}
					dataaa.push(obj);
						}
				}
				dataaa.push({x:globaldate22,y:globaltime22});
				
				
			var timeFormat = 'YYYY-MM-DD';
            var resFormat = 'hh:mm:ss.SSS';
			var pointBackgroundColors1 = [];
			var pointBorderColors1 = [];
				
    var config = {
        type:    'line',
        data:    {
            datasets: [
                {
                    label: 'График изменения.',
                    data: dataaa,
                    fill: false,
                    borderColor: 'red',
					backgroundColor: 'red',
					pointBackgroundColor: 'red',
					pointBorderColor:'red'
                }
            ]
        },
		
        options: {
            responsive: true,
          
			  tooltips: {
                    mode: 'point'
                },
			scales:     {
				

			
				
                xAxes: [{
                    type:       "time",
					distribution: 'linear',
                    time:       {
                        parser: timeFormat,
						unit: 'month',
                    },
                    scaleLabel: {
                        display:     true,
                        labelString: 'Дата'
                    }
                }],
                 yAxes: [{
					type:'time',
					 time:{
						 parser:resFormat,
						 unit:'second',
						 displayFormats: {
                        second: 'mm:ss.SSS'
                    },
					 },
                    scaleLabel: {
                        display:     true,
                        labelString: 'Время'
                    }
                }]
            },
        },
	};
 	
	var ctx  = document.getElementById("myChart").getContext("2d");
				if (chart == null)
					{
    chart = new Chart(ctx, config);				
chart.update();
					}	
				else 
					{
						chart.destroy();	
						chart = null;
						chart = new Chart(ctx, config);				
                         chart.update();
					}
		
			}
		});
			   
			   
		   }
		 
	 });
	
	
});
	
			
$('#button1').click(function() {
	
	if (p1&&p2)
		{
	var diff;
(p1>p2) ? diff=p1-p2 : diff=p2-p1;
var mm = new Date(diff).getMinutes(), ss = new Date(diff).getSeconds(), mss = new Date(diff).getMilliseconds();
(mm<10) ? mm='0'+mm:''; (ss<10) ? ss='0'+ss:''; (mss<100 && mss>10) ? mss='0'+mss:''; (mss<100 && mss<10) ? mss='00'+mss:'';
diff = mm+':'+ss+'.'+mss;
	p1 = null;
	p2 = null;
	$('.1st').text(null);
	$('.2nd').text(null);		
	$('.js-element').text(diff);
		}
});

function convert(x){
	var one = x.split(':'),two = one[2].split('.');
	return new Date(0,0,0,one[0],one[1],two[0],two[1]);
}
	
});
	
 
</script>
	<script type="text/javascript" src="Moment.js"></script> 
	<script type="text/javascript" src="Chart.js"></script>
	<script language="javascript" type="text/javascript">
		$(document).ready(function() {
			var check = false;
			$('#moretime').click(function(){
				check = true;
			});
			
			var chart;	
			var name;
			var surname; 
			var age;
			var coach;
			var dataa1 = [];
			var globaldate1;
			var globaltime1;
			name = $('#name1').text();
			surname = $('#surname1').text();
			age = $('#age1').text();
			coach = $('#coacher1').text();
			
		$('#mytable TR').click(function(){
			if (check) {
				check = false;
			var date,distance,time;
			
				
      date = $(this).children('td:eq(2)').text(), distance = $(this).children('td:eq(0)').text(),time = $(this).children('td:eq(1)').text()
			globaldate1 = date;
			globaltime1 = time;
    $.ajax({
		
        type: 'POST',
        url: 'handlermy.php',
        data: {date:date,distance:distance,name:name,surname:surname,age:age,coach:coach},
        success: function(datta){
			
            var pattern0 = function(){ return datta.split('#')[0].split('|'); }, pattern1 = function(){ return datta.split('#')[1].split('|'); },
            list = {
                more : {
                    date : pattern0(),
                    time : pattern0()
                },
                less : {
                    date : pattern1(),
                    time : pattern1()
                }
            };
            for(i=0; i<list.more.date.length; i++){
                list.more.date[i] = list.more.date[i].split('*')[0];
                list.more.time[i] = list.more.time[i].split('*')[1];
            }
            for(i=0; i<list.less.date.length; i++){
                list.less.date[i] = list.less.date[i].split('*')[0];
                list.less.time[i] = list.less.time[i].split('*')[1];
            }
            
            dataa1 = [];
			var obj = {};
			
			
			for (i=0;i<list.less.date.length;i++)
				{
					if (list.less.time[i]!=null && list.less.time[i]!=' ')
						{
							obj = {x:list.less.date[i],y:list.less.time[i]}
					dataa1.push(obj);
						}
				}
           
			dataa1.push({x:globaldate1,y:globaltime1});
			
			
			for (i=0;i<list.more.date.length;i++)
				{
					if (list.more.time[i]!=null&& list.more.time[i]!=' ')
						{
							obj = {x:list.more.date[i],y:list.more.time[i]}
					dataa1.push(obj);
						}
				}			
 draw();
			}
		
		
   		});
				
			
			}
		});
		
				
		
		function draw()
			{
			var timeFormat = 'YYYY-MM-DD';
            var resFormat = 'hh:mm:ss.SSS';
			var pointBackgroundColors1 = [];
			var pointBorderColors1 = [];
				
    var config = {
        type:    'line',
        data:    {
            datasets: [
                {
                    label: 'График изменения.',
                    data: dataa1,
                    fill: false,
                    borderColor: 'red',
					backgroundColor: 'red',
					pointBackgroundColor: pointBackgroundColors1,
					pointBorderColor:pointBorderColors1
                }
            ]
        },
		
        options: {
            responsive: true,
          
			  tooltips: {
                    mode: 'point'
                },
			scales:     {
				

			
				
                xAxes: [{
                    type:       "time",
					distribution: 'linear',
                    time:       {
                        parser: timeFormat,
						unit: 'month',
                    },
                    scaleLabel: {
                        display:     true,
                        labelString: 'Дата'
                    }
                }],
                 yAxes: [{
					type:'time',
					 time:{
						 parser:resFormat,
						 unit:'second',
						 displayFormats: {
                        second: 'mm:ss.SSS'
                    },
					 },
                    scaleLabel: {
                        display:     true,
                        labelString: 'Время'
                    }
                }]
            },
        },
	};
 	
	var ctx  = document.getElementById("myChart").getContext("2d");
				if (chart == null)
					{
    chart = new Chart(ctx, config);				
				for (i = 0; i < dataa1.length; i++) {
    if (Date.parse(dataa1[i].x) > Date.parse(globaldate1)) {
        pointBackgroundColors1.push("#7a0801");
		pointBorderColors1.push("#7a0801");
    } else if (Date.parse(dataa1[i].x) < Date.parse(globaldate1)) {
        pointBackgroundColors1.push("#ff8077");
		pointBorderColors1.push("#ff8077");
    }
					else if (Date.parse(dataa1[i].x)==Date.parse(globaldate1))
									{
								pointBackgroundColors1.push('#ff1000');
		                    pointBorderColors1.push("#ff1000");
									}
				}

								


chart.update();
					}
					
				else 
					{
						chart.destroy();	
						chart = null;
						chart = new Chart(ctx, config);				
				for (i = 0; i < dataa1.length; i++) {
    if (Date.parse(dataa1[i].x) > Date.parse(globaldate1)) {
        pointBackgroundColors1.push("#7a0801");
		pointBorderColors1.push("#7a0801");
    } else if (Date.parse(dataa1[i].x) < Date.parse(globaldate1)) {
        pointBackgroundColors1.push("#ff8077");
		pointBorderColors1.push("#ff8077");
    }
					else if (Date.parse(dataa1[i].x)==Date.parse(globaldate1))
									{
								pointBackgroundColors1.push('#ff1000');
		                    pointBorderColors1.push("#ff1000");
									}
				}
							

chart.update();
					}
		}
			
			});

</script>
<meta charset="utf-8">
<title>Stats</title>
	</head>

	
	<style>
.block:hover::after{
	content: attr(data-title);
	 position: absolute; /* Абсолютное позиционирование */
    left: 20%; top: 31%; /* Положение подсказки */
    z-index: 1; /* Отображаем подсказку поверх других элементов */
    background: rgba(255,255,255,1.00); /* Полупрозрачный цвет фона */
    font-family: Arial, sans-serif; /* Гарнитура шрифта */
    font-size: 16px; /* Размер текста подсказки */
    padding: 5px ; /* Поля */
    border: 1px solid #333; /* Параметры рамки */
}
	</style>	
<style>
	
		.chart{
			position:absolute;
			top: 60%;
			left:0;
		}
		.res{
			position: relative;
			left: 0%;
			top:70%;
		}

			.button1
			{
				position: relative;
				top: 60%;
			}
			.js-element{
				position: relative;
				top: 60%;
				left: 0%;
			}
.pager
	{
		position: relative;
		
	}

	</style>
	

	<style>
		   .sidenav{
		       height: 0%;
			   width: 100%;
			   position: absolute;
			   z-index: 1;
			   top: 0;
			   left: 0;
			   background-color: antiquewhite;
			   overflow-y: hidden;
			   overflow-x: hidden;
			   padding-top: 0px;
			   transition: 0.1s;
			   
		   }
		.sidenav a
		{
			text-decoration: none;
			font-size: 16px;
			color: black;
			background-color: antiquewhite;
			display:contents;
             transition: 0.1s;
			 overflow-y: hidden;
			overflow-x: hidden;
		}
		.sidenav input
		{
			padding-top: 1px;
			display: inline-block;
			
		}
		.sidenav a:hover
		{
			color: darkgrey;
			cursor: default;
			
		}
		
		.sel{
			position: relative;
			overflow-x: hidden;
		    overflow-y: hidden;
		}
		.nad
		{
			position:relative;
			top: 0%;
			left: 36%;
			font-size: 25px;
		}
		.lock{
			display: inline-block;
    cursor: pointer;
			position: relative;
		}
		.bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: #333;
    margin: 6px 0;
			transition: 0.1s;
	
}
.change .bar1 {
    -webkit-transform: rotate(-45deg) translate(-9px, 6px) ;
    transform: rotate(-45deg) translate(-9px, 6px) ;
}

/* Fade out the second bar */
.change .bar2 {
    opacity: 0;
}

/* Rotate last bar */
.change .bar3 {
    -webkit-transform: rotate(45deg) translate(-8px, -8px) ;
    transform: rotate(45deg) translate(-8px, -8px) ;
}
		</style>

	
	
<body>
	
	    <div id = 'mySidenav' class = 'sidenav'>
		<form name="form3" action="stats.php" method="POST" class="select">
<a>Имя </a><input type="TEXT" id = "name" name="name">  
<a>Фамилия </a><input type="TEXT" id = "surname" name="surname"> 
<a>Тренер </a><input type="TEXT" id = "coacher" name="coacher"> 
<a>Возраст </a><input type="TEXT" id = "age" name="age"> 
<a>Дистанция</a>
<a><select id="dis" name="dis" class="sel">
    <option disabled>Выберите дистанцию</option>
    <option value="50 вольный">50м вольный</option>
    <option value="100 вольный">100м вольный</option>
    <option value="200 вольный">200м вольный</option>
	<option value="400 вольный">400м вольный</option>
    <option value="800 вольный">800м вольный</option>
    <option value="1500 вольный">1500м вольный</option>
	<option value="50 на спине">50м на спине</option>
    <option value="100 на спине">100м на спине</option>
    <option value="200 на спине">200м на спине</option>
	<option value="50 баттерфляй">50м баттерфляй</option>
    <option value="100 баттерфляй">100м баттерфляй</option>
    <option value="200 баттерфляй">200м баттерфляй</option>
	<option value="100 комплексное плвание">100м комплексное плавание</option>
    <option value="200 комплексное плвание">200м комплексное плавание</option>
    <option value="400 комплексное плвание">400м комплексное плавание</option>
	</select> </a>
		
<a><input type="radio" name="type" value="50">  50m </a>
<a><input type="radio" name="type" value="25">  25m </a> 
<a><input type='submit' id = 'button' value='Найти'> </a>
</form>
	</div>
	<div id="main">
	<div class="lock" onClick="openNav(this)">
		<div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
		</div>
	<a class="1st" id="1st"> </a>
	<a class="2nd" id="2nd"> </a>
		<script type="text/javascript" src="jquery.tablesorter.pager.js"></script>
	<?php
	
	
	
	
	if (isset($_POST['name'])&& isset($_POST['surname']) && isset($_POST['coacher'])&& isset($_POST['age']) && isset($_POST['dis']))
{

				
			
$name =  $_POST['name'];
$age = $_POST['age'];
$surname = $_POST['surname'];		
$coacher = $_POST['coacher'];
$dis = $_POST['dis'];
$type = $_POST['type'];

		
	
}
	if ($name!=null&&$surname!=null&&$age!=null&&$coacher!=null&&$type!=null&&$dis!=null)
	{
		
		$connection = mysqli_connect('127.0.0.1','root','lolik228','InfoPlov');
		
	if ($connection==false)
	{
		echo mysqli_connect_error();
		exit();
	}
	$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coacher' AND `bastype`='$type' AND distance = '$dis'");
		$row1=mysqli_fetch_array($result);
		
		if ($row1)
		{
		echo "<div class='nad'><a id = 'name1'>".$name." </a><a id = 'surname1'>".$surname." </a><a id = 'age1'>".$age." <a id = 'coacher1'>".$coacher." </a><a>".$row1['Success']." </a></div>";
	echo "<table width = '50%' border='1' id = 'mytable' cellpadding = '0' cellspacing='0' class = 'tablesorter'>
<thead>

<tr>

<th>Дистанция</th>
<th>Время</th>
<th>Дата</th>
<th>Разряд</th>
<th>Город</th>
</tr></thead>";
	echo "<tbody>";
	while ($row=mysqli_fetch_array($result))
	{
		if ($row["bastype"]==50)
			{
				
			$resilto = mysqli_query($connection,"SELECT * FROM `Raz` WHERE Type like '".$row['distance']."' AND Gen like '".$row['Gen']."'");
			}
			if ($row["bastype"]==25)
			{
				$resilto = mysqli_query($connection,"SELECT * FROM `Razz` WHERE Type like '".$row['distance']."'AND Gen like '".$row['Gen']."'");
			}
			$rez = mysqli_fetch_array($resilto);
			
		if ($rez["МСМК"]<$row["time"])
		{
		$msmk = "-".(new DateTime($rez["МСМК"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["МСМК"]))->diff(new DateTime($row["time"]))->s;
		}
	    if ($rez["МСМК"]>$row["time"])
		{
		$msmk = "+".(new DateTime($rez["МСМК"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["МСМК"]))->diff(new DateTime($row["time"]))->s;
		}
			if ($rez["МС"]<$row["time"])
			{
		$ms = "-".(new DateTime($rez["МС"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["МС"]))->diff(new DateTime($row["time"]))->s;
			}
			if ($rez["МС"]>$row["time"])
			{
		$ms = "+".(new DateTime($rez["МС"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["МС"]))->diff(new DateTime($row["time"]))->s;
			}
			
			if ($rez["КМС"]<$row["time"])
			{
		$kms = "-".(new DateTime($rez["КМС"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["КМС"]))->diff(new DateTime($row["time"]))->s;	
			}
			
			if ($rez["КМС"]>$row["time"])
			{
		$kms = "+".(new DateTime($rez["КМС"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["КМС"]))->diff(new DateTime($row["time"]))->s;	
			}
			
			if ($rez["I"]<$row["time"])
			{
		$I = "-".(new DateTime($rez["I"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["I"]))->diff(new DateTime($row["time"]))->s;
			}
			if ($rez["I"]>$row["time"])
			{
		$I = "+".(new DateTime($rez["I"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["I"]))->diff(new DateTime($row["time"]))->s;
			}
			
			if ($rez["II"]<$row["time"]){
		$II = "-".(new DateTime($rez["II"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["II"]))->diff(new DateTime($row["time"]))->s;}
			if ($rez["II"]>$row["time"]){
		$II = "+".(new DateTime($rez["II"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["II"]))->diff(new DateTime($row["time"]))->s;}
			
			if ($rez["III"]<$row["time"]){
		$III = "-".(new DateTime($rez["III"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["III"]))->diff(new DateTime($row["time"]))->s;}
			if ($rez["III"]>$row["time"]){
		$III = "+".(new DateTime($rez["III"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["III"]))->diff(new DateTime($row["time"]))->s;}
		
			if ($rez["Iu"]<$row["time"]){
		$ip = "-".(new DateTime($rez["Iu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["Iu"]))->diff(new DateTime($row["time"]))->s;}
			if ($rez["Iu"]>$row["time"]){
		$ip = "+".(new DateTime($rez["Iu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["Iu"]))->diff(new DateTime($row["time"]))->s;}
			
		if ($rez["IIu"]<$row["time"]){	
		$iip = "-".(new DateTime($rez["IIu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["IIu"]))->diff(new DateTime($row["time"]))->s;}
		
			if ($rez["IIu"]>$row["time"]){	
		$iip = "+".(new DateTime($rez["IIu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["IIu"]))->diff(new DateTime($row["time"]))->s;}
			
			if ($rez["IIIu"]<$row["time"]){	
		$iiip = "-".(new DateTime($rez["IIIu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["IIIu"]))->diff(new DateTime($row["time"]))->s;}
		if ($rez["IIIu"]>$row["time"]){	
		$iiip = "+".(new DateTime($rez["IIIu"]))->diff(new DateTime($row["time"]))->i.":".(new DateTime($rez["IIIu"]))->diff(new DateTime($row["time"]))->s;}	
			
			
				$raz="МСМК-".$rez["МСМК"]." ".$msmk." \n МС-".$rez["МС"]." ".$ms."\n КМС-".$rez["КМС"]." ".$kms."\n\nI-".$rez["I"]." ".$I."\nII-".$rez["II"]." ".$II."\n III-".$rez["III"]." ".$III."\nI(ю)-".$rez["Iu"]." ".$ip." II (ю)-".$rez["IIu"]." ".$iip."\nIII(ю)-".$rez["IIIu"]." ".$iiip;
	echo "<tr><td class = block data-title = '.$raz.'>".$row["distance"]."</td><td>".$row["time"]."</td><td>".$row["date"]."</td><td>".$row["locsuccess"]."</td><td>".$row["place"]."</td></tr>";
	}
	echo "</tbody></table>";
	

   
	if($name!=null&&$surname!=null&&$age!=null&&$coacher!=null&&$type!=null)
	{
		echo "<div id='pager' class='pager'> 
	<form> 
		<img src='first.png' class='first'/> 
		<img src='prev.png' class='prev'/> 
		<input type='text' class='pagedisplay'/> 
		<img src='next.png' class='next'/> 
		<img src='last.png' class='last'/> 
		<select class='pagesize'> 
			<option value='5'>5</option> 
			<option selected='selected' value='10'>10</option> 
			<option value='20'>20</option> 
			<option value='30'>30</option> 
		</select> 
	</form> 
</div>";
	}
	mysqli_close($connection);
	}
	}
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
   <div class = "res" id="res"></div>
	
	


	<div class='js-element'></div>
	<button id="button1" class = "button1">Кнопка</button>
	<button id ="selectmode">Выбрать промежуток</button>
		<button id ="moretime">Выбрать 5</button>
		</div>
			
	<canvas class = "chart" id="myChart" width="800" height="200"></canvas>
	

	
<script type="text/javascript">
		$.tablesorter.addParser({ 
        // set a unique id 
        id: 'grades', 
        is: function(s) { 
            // return false so this parser is not auto detected 
            return false; 
        }, 
        format: function(s) { 
            // format your data for normalization 
            return s.replace(/III юн/,0).replace(/II юн/,1).replace(/I юн/,2).replace(/III/,3).replace(/II/,4).replace(/I/,5).replace(/КМС/,6).replace(/МС/,7).replace(/МСМК/,8); 
        }, 
        // set type, either numeric or text 
        type: 'numeric' 
    }); 
     
    $(function() { 
        $("mytable").tablesorter({ 
            headers: { 
                3: { 
                    sorter:'grades' 
                } 
            } 
        }); 
    });     
    </script>
	
	<script type="text/javascript">
		$(document).ready(function() { 
    $("#mytable") 
	.tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
			document.getElementById("mySidenav").style.height = "0%";
}); 
    </script>
		
	
<script>
		function openNav(x)
	{
		if (document.getElementById("mySidenav").style.height=="0%")
			{x.classList.toggle("change");
		document.getElementById("mySidenav").style.height = "21.5px";
		document.getElementById("main").style.transform="translateY(4%)";	
			}
		else if (document.getElementById("mySidenav").style.height == "21.5px") //22.1
			{x.classList.toggle("change");
				document.getElementById("mySidenav").style.height = "0%";
		document.getElementById("main").style.transform="translateY(0%)";
		
			}
	}
		
		</script>

</body>
</html>