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
	if (name=="")
		{
$(function(){
   var docHeight = $(document).height();
   $("body").append("<div id='overlay'></div>");
   $("#overlay")
      .height(docHeight)
      .css({
         'opacity' : 0.4,
         'position': 'absolute',
         'top': 0,
         'left': 0,
         'background-color': 'black',
         'width': '100%',
         'z-index': 5000
      });
	
});
		}
	else{
		 $("#overlay")
      .css({
         'visibility':'hidden'
      });
		$('#upper')
	.css({
		visibility:'hidden'
	});
	}
	var chart;	

chart = new Chart(document.getElementById("myChart").getContext("2d"), {
	type:"line",
    data: [null]
	});

   chart.update();
document.getElementById("myChart").style.backgroundColor = 'rgb(191, 191, 191)';
document.getElementById("myChart").style.border = '1px solid black';
					 

	
	var sel1 = false;
	var sel2 = false;
	var globaldate21,globaltime21,globaldate22,globaltime22;
	var distance;
	 $('#mytable TR').click(function() {
		 if(!sel1)
			 {
				 
				 sel1 = $(this).children('td:eq(2)').text();
				 globaldate21 = sel1;
				 globaltime21 = $(this).children('td:eq(1)').text();
				 distance = $(this).children('td:eq(0)').text();
				 $('.fst').text(sel1);
				 return;
			 }
		 
		 if (sel1&&!sel2)
		   {
			   document.getElementById("myChart").style.backgroundColor = 'white';
			   document.getElementById("nodata").style.visibility = 'hidden';
			   document.getElementById("myChart").style.border = '0px';
			  sel2 = $(this).children('td:eq(2)').text();	
			   globaldate22 = sel2;
				 globaltime22 = $(this).children('td:eq(1)').text();
			   $('.snd').text(sel2);
			   
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
			   
			 sel1 = false;
	  sel2 = false; 
		   }
		 
	 });
	
	

	
			

});
	 
</script>
	<script type="text/javascript" src="Moment.js"></script> 
	<script type="text/javascript" src="Chart.js"></script>
	
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
	
		



	</style>
	

	<style>

		.times{
			position: absolute;
			left:81%;
			top:10%;
			border-color: aqua;
			border: medium;
		}
		.times .lable1,.lable2
		{
			font-size: 30px;
		}
		
		.times .fst
		{
			position: relative;
			
			color: red;

		}
		.times .snd
		{
			position: relative;
			top: 100%;
			color: red;
			
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
		.chart-container{
			width: 80%;
			margin-top: 10px;
		}
		
		.tablesorter tr
		{
			cursor:pointer;
		}
		.nodata{
			position: absolute;
			top:13%;
			left:33%;
			font-size: 50px;
		}
		.upper{
			z-index: 99999;
			background-color: aqua;
			position: absolute;
			top: 30%;
            left: 35%;
			height: 40%;
			width: 20%;
		}
		.input {clear:both; text-align:right;line-height:25px;}
        label {float:left;padding-right:10px;}
.lop {float:left}
		</style>
 
	
	
<body>
	<div class="upper" id="upper">
	    
		<form name="form3" action="stats.php" method="POST" class="lop">
<label>Имя </label><input type="TEXT" id = "name" name="name" class="input">  <br>
<label>Фамилия </label><input type="TEXT" id = "surname" name="surname" class="input"> <br>
<label>Тренер </label><input type="TEXT" id = "coacher" name="coacher" class="input"> <br>
<label>Возраст </label><input type="TEXT" id = "age" name="age" class="input"> <br>
<label>Дистанция</label>
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
	</select> </a><br>
		
<a><input type="radio" name="type" value="50">  50m </a>
<a><input type="radio" name="type" value="25">  25m </a> <br>
<a><input type='submit' id = 'button' value='Найти'> </a>
</form>
	</div>
		<script type="text/javascript" src="jquery.tablesorter.pager.js"></script>
	
	<div class="chart-container">
		
<canvas class = "chart" id="myChart" height="50%"></canvas>
		<a class = "nodata" id="nodata">No data</a>
		</div>
	<div class="times">
	<a class = "lable1">1st pckd time</a> <br>
	<a class="fst"> </a> <br>
	<a class="lable2">2nd pckd time</a> <br>
	<a class="snd"> </a>
		</div>
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
	$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE `Name` like '%".$name."%' AND `Surname` like '%".$surname."%' AND `Age`='$age' AND `Coacher` like '%".$coacher."%' AND `bastype`='$type' AND distance = '$dis'");
		$row1=mysqli_fetch_array($result);
		
		if ($row1)
		{
		echo "<div class='nad'><a id = 'name1'>".$row1['Name']." </a><a id = 'surname1'>".$row1['Surname']." </a><a id = 'age1'>".$age." <a id = 'coacher1'>".$row1['Coacher']." </a><a>".$row1['Success']." </a></div>";
	echo "<table width = '100%' border='1' id = 'mytable' cellpadding = '0' cellspacing='0' class = 'tablesorter'>
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
		
				
			$resilto = mysqli_query($connection,"SELECT * FROM `Raz` WHERE Type like '".$row['distance']."' AND Gen like '".$row['Gen']."' AND bType like '".$row["bastype"]."'");
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
	

   

	mysqli_close($connection);
	}
	}
	?>
	


	
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
		


</body>
</html>