<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorte.js"></script>
	
<script language="javascript" type="text/javascript" >
$(document).ready(function() {
	
   var p1;
	var p2;
	

	
	
	
   $('#mytable TR').click(function() {
	   if (!p1)
		   {
        p1 = convert($(this).children('td:eq(1)').text());
			   return;
		   }
	   if (p1&&!p2)
		   {
			   p2 = convert($(this).children('td:eq(1)').text());
		   }
   });
   
   

$('button').click(function() {
	if (p1&&p2)
		{
	var diff;
(p1>p2) ? diff=p1-p2 : diff=p2-p1;
var mm = new Date(diff).getMinutes(), ss = new Date(diff).getSeconds(), mss = new Date(diff).getMilliseconds();
(mm<10) ? mm='0'+mm:''; (ss<10) ? ss='0'+ss:''; (mss<100 && mss>10) ? mss='0'+mss:''; (mss<100 && mss<10) ? mss='00'+mss:'';
diff = mm+':'+ss+'.'+mss;
	p1 = null;
	p2 = null;
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
                    label: 'Выбранное 1 время .',
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
	.form1{
		position: absolute;
		top: 70%;
	}
		.chart{
			position: absolute;
			top: 80%;
			left:0;
		}
		.res{
			position: absolute;
			left: 40%;
			top:70%;
		}

			.button1
			{
				position: absolute;
				top: 60%;
			}
			.js-element{
				position: absolute;
				top: 60%;
				left: 50%;
			}
	 
	</style>
	
	<style>
		.opentable
		{
			position: absolute;
			right: 50%;
			top: 0%;
			transition: 0.5s;
		}
		   .sidenav{
		       height: 0;
			   width: 100%;
			   position: fixed;
			   z-index: 1;
			   top: 0;
			   left: 0;
			   
			   background-color: white;
			   overflow-x: hidden;
			   padding-top: 0px;
			   transition: 0.5s;
		   }
		.sidenav a
		{
			padding: 0px;
			text-decoration: none;
			font-size: 12px;
			color: blanchedalmond;
			background-color: grey;
			display:block;
			transition: 0.5s;
		}
		.sidenav a:hover
		{
			color: darkgrey;	
		}
		.sidenav form:hover
		{
			color: darkgrey;
		}
		</style>
	
<body>
	<div id = 'mySidenav' class = 'sidenav'>
		<form name="form3" action="stats.php" method="POST">
<input type="TEXT" id = "name" name="name">
<input type="TEXT" id = "surname" name="surname">
<input type="TEXT" id = "coacher" name="coacher">
<input type="TEXT" id = "age" name="age">
<input type="TEXT" id = "dis" name = "dis">
<input type="radio" name="type" value="50"> 50m 
<input type="radio" name="type" value="25"> 25m 
<input type='submit' id = 'button' value='Отправить'>
</form>
		</div>
	<div id="click">
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
		echo "<a id = 'name1'>".$name."</a><br><a id = 'surname1'>".$surname."</a><br><a id = 'age1'>".$age."<br><a id = 'coacher1'>".$coacher."</a><br><a>".$row1['Success']."</a>";
	echo "<table width = '50%' border='1' id = 'mytable' cellpadding = '0' cellspacing='0' class = 'tablesorter'>
<thead>

<tr>

<th>Дистанция</th>
<th>Время</th>
<th>Дата</th>
<th>Разряд</th>
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
	echo "<tr><td class = block data-title = '.$raz.'>".$row["distance"]."</td><td>".$row["time"]."</td><td>".$row["date"]."</td><td>".$row["locsuccess"]."</td></tr>";
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
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   <div class = "res" id="res"></div>
	<script type="text/javascript" src="jquery.tablesorter.pager.js"></script>
	


		<div class='js-element'></div>
	<button class = "button1">Кнопка</button>
		
		
			</div>
	<canvas class = "chart" id="myChart" width="800" height="200"></canvas>
	
	<span id = "open" class="opentable" onClick="openNav()">open</span>
	</div>
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
}); 
    </script>
		
	
<script>
	$(document).mouseup(function (e){ 
        var block = $("#mySidenav"); 
        if (!block.is(e.target)&& block.has(e.target).length === 0 && document.getElementById("mySidenav").style.height != "0px") { // && block.has(e.target).length === 0 проверка условия если клик не по его дочерним элементам
            document.getElementById("mySidenav").style.height = "0px";
			document.getElementById("open").style.top="0%";
        }
    });
	 

		function openNav()
	{
		document.getElementById("mySidenav").style.height = "28px";
		document.getElementById("open").style.top="3%";
		
	}

		
		</script>
</body>
</html>