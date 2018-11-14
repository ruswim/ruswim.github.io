<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="dataTables.bootstrap4.min.css">
<script type="text/javascript" src="jquery-3.3.1.js"></script> 
<script language="javascript" type="text/javascript" >
	

$(document).ready(function() {

   var p1;
	var p2;
	var sel3;
	var sel4;
	moment.locale("ru");
	
	
	
	
        var name = $('#name1').text();
		var	surname = $('#surname1').text();
		var	age = $('#age1').text();
		var	coach = $('#coacher1').text();
	var chart;	


					 

	
	var sel1 = false;
	var sel2 = false;
	var globaldate21,globaltime21,globaldate22,globaltime22;
	var distance;
	 $('#table TR').click(function() {
		 if(!sel1&&$(this).text()!="ДистанцияВремяДатаРазрядГород")
			 {
				sel3 = $(this).children('td:eq(2)');
				 $(this).children('td:eq(2)').css('background', "#1971ff");
				 sel1 = $(this).children('td:eq(2)').text();
				 globaldate21 = sel1;
				 globaltime21 = $(this).children('td:eq(1)').text();
				 distance = $(this).children('td:eq(0)').text();
				 return;
			 }
		 
		 if (sel1&&!sel2&&$(this).text()!="ДистанцияВремяДатаРазрядГород")
		   {
			   sel4 = $(this).children('td:eq(2)');
			   $(this).children('td:eq(2)').css('background', "#1971ff");
			    
			  sel2 = $(this).children('td:eq(2)').text();
			   if (sel1!=sel2) {
			   globaldate22 = sel2;
				 globaltime22 = $(this).children('td:eq(1)').text();
			   
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
		responsive:true,
        data:    {
            datasets: [
                {
                    label: 'График изменения.',
                    data: dataaa,
                    fill: false,
borderColor:"#1971ff",
            pointBorderColor: "#1971ff",
            pointBackgroundColor: "#1971ff",
            pointHoverBackgroundColor: "#1971ff",
            pointHoverBorderColor: "#1971ff",
            pointBorderWidth: 4,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 4,
            pointRadius: 2,
            borderWidth: 2,
                }
            ]
        },
		
        options: {
            
          maintainAspectRatio: false,
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
                    },
					gridLines: {
                    drawTicks: false,
                    display: false
                },
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
					 gridLines: {
                    drawTicks: false,
                    display: false
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

body {
	overflow-x: hidden;
}
		

		.nad
		{
			position:relative;
			left: 36%;
			font-size: 25px;
		}
		
		.tablesorter tr
		{
			cursor:pointer;
		}


		</style>
 
	
	
<body>
	    


<button id = "but1">График</button>
	<div class="chart-container" style="height: 200px">
		<canvas id="myChart"></canvas>
	</div>

	<?php
	
	
	
	
	if (isset($_POST['name'])&& isset($_POST['surname']) && isset($_POST['coacher'])&& isset($_POST['age'])&& isset($_POST['dis']))
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
	echo "<table width = '100%' border='1' id = 'table' cellpadding = '0' cellspacing='0' class = 'tablesorter'>
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
			
	

   

	mysqli_close($connection);
	}
	}
	?>



	

		<script type="text/javascript" src="jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
    $('#table').DataTable();
} );

    </script>
		


</body>
</html>