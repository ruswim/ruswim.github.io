<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 		
	
<script language="javascript" type="text/javascript" >
$(document).ready(function() {
   var p1;
	var p2;
	
	
   $('#mytable1 TD').click(function() {
        p1 = convert($(this).text());
   });
   
   $('#mytable2 TD').click(function() {
        p2 = convert($(this).text());
	    
   });
   

$('button').click(function() {
	var diff;
(p1>p2) ? diff=p1-p2 : diff=p2-p1;
var mm = new Date(diff).getMinutes(), ss = new Date(diff).getSeconds(), mss = new Date(diff).getMilliseconds();
(mm<10) ? mm='0'+mm:''; (ss<10) ? ss='0'+ss:''; (mss<100 && mss>10) ? mss='0'+mss:''; (mss<100 && mss<10) ? mss='00'+mss:'';
diff = mm+':'+ss+'.'+mss;
	$('.js-element').text(diff);
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
			var name;
			var surname; 
			var age;
			var coach;
			name = $('#name1').text();
			surname = $('#surname1').text();
			age = $('#age1').text();
			coach = $('#coacher1').text();
			alert(name);
			$('#button').click(function(){ 
			name = $('#name1').text();
			surname = $('#surname1').text();
			age = $('#age1').text();
			coach = $('#coacher1').text();});
			alert(name);
			
		$('#mytable1 TR').click(function(){
     var date = $(this).children('td:eq(2)').text(), distance = $(this).children('td:eq(0)').text();
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
            
            var dataa = [];
			var obj = {};
			
			var dataa2 = [];
			var obj = {};
			
			
			for (i=0;i<list.less.date.length;i++)
				{
					if (list.less.time[i]!=null && list.less.time[i]!=' ')
						{
							obj = {x:list.less.date[i],y:list.less.time[i]}
					dataa.push(obj);
						}
				}
           
			for (i=0;i<list.more.date.length;i++)
				{
					if (list.more.time[i]!=null&& list.more.time[i]!=' ')
						{
							obj = {x:list.more.date[i],y:list.more.time[i]}
					dataa.push(obj);
						}
				}
			
			
			
			
			
			
			var timeFormat = 'YYYY-MM-DD';
            var resFormat = 'hh:mm:ss.SSS';
    var config = {
        type:    'line',
        data:    {
            datasets: [
                {
                    label: 'Учёт результатов',
                    data: dataa,
                    fill: true,
                    borderColor: 'red'
                },
				{
				label:'Учёт рез',
					data:distance,
					borderColor:'blue'
				}
            ]
        },
        options: {
            responsive: true,
            title:      {
                display: true,
            },
            scales:     {
                xAxes: [{
                    type:       "time",
					distribution: 'linear',
					ticks:{
					sourse: 'data'
				},
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
            }
        }
    };
	var ctx  = document.getElementById("myChart").getContext("2d");
        window.myLine = new Chart(ctx, config);
			}
		
    });
					  });
			$('#mytable2 TR').click(function(){
				
				
				
				
				
				
				
				
				
			});
		});
			

</script>
<meta charset="utf-8">
<title>Stats</title>
</head>

	
	
<style>
	.form1{
		position: absolute;
		top: 70%;
	}
		.chart{
			position: absolute;
			top: 80%;
		}
		.res{
			position: absolute;
			left: 40%;
			top:70%;
		}
		.tablesorter1
		{
			position: absolute;
			height: 40px;
			left:0%;
		    
		}
	table.tablesorter1 .header {
		left: 40%;
	background-image: url(bg.png);
	background-repeat: no-repeat;
	text-align: right;
	

 font-size: 8px;
		
		
	height: 30px;
		
}
table.tablesorter1 .headerSortUp {
	background-image: url(asc.png);
	background-repeat: no-repeat;
	
	
}
table.tablesorter1 .headerSortDown {
	background-image: url(desc.png);
	background-repeat: no-repeat;
	
}
	</style>
<style>
		.tablesorter2
		{
			position: absolute;
			left:50%;
		    
		}
	table.tablesorter2 .header {
		left: 40%;
	background-image: url(bg.png);
	background-repeat: no-repeat;
	text-align: right;
	

 font-size: 8px;
		
		
	height: 30px;
		
}
table.tablesorter2 .headerSortUp {
	background-image: url(asc.png);
	background-repeat: no-repeat;
	
	
}
table.tablesorter2 .headerSortDown {
	background-image: url(desc.png);
	background-repeat: no-repeat;
	
}
			.button1
			{
				position: absolute;
				top: 90%;
			}
			.js-element{
				position: absolute;
				top: 60%;
				left: 50%;
			}
	</style>
<body>
	
	<?php
	
	if (isset($_POST['name'])&& isset($_POST['surname']) && isset($_POST['coacher'])&& isset($_POST['age']))
{
//здесь прописываем код обработки формы
				
			
$name =  $_POST['name'];
$age = $_POST['age'];
$surname = $_POST['surname'];		
$coacher = $_POST['coacher'];
echo "<a id='name1'>".$name."</a><br></br><a id='surname1'>".$surname."</a><br></br><a id='age1'>".$age."</a><br></br><a id='coacher1'>".$coacher."</a>";		
	
}
	if ($name!=null&&$surname!=null&&$age!=null&&$coacher!=null)
	{
		
		$connection = mysqli_connect('127.0.0.1','root','lolik228','InfoPlov');
		
	if ($connection==false)
	{
		echo mysqli_connect_error();
		exit();
	}
	$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coacher'");
	echo "<table width = '50%' border='1' id = 'mytable1' cellpadding = '0' cellspacing='0' class = 'tablesorter1'>
<thead>

<tr>

<th>Дистанция</th>
<th>Время</th>
<th>Разряд</th>
</tr></thead>";
	echo "<tbody>";
	while ($row=mysqli_fetch_array($result))
	{
	echo "<tr><td>".$row["distance"]."</td><td>".$row["time"]."</td><td>".$row["date"]."</td></tr>";
	}
	echo "</tbody></table>";
	

   $result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coacher'");
	echo "<table width = '50%' border='0' id = 'mytable2' cellpadding = '0' cellspacing='0' class = 'tablesorter2'>
<thead>

<tr>

<th>Дистанция</th>
<th>Время</th>
<th>Разряд</th>
</tr></thead>";
	echo "<tbody>";
	while ($row=mysqli_fetch_array($result))
	{
	echo "<tr><td>".$row["distance"]."</td><td>".$row["time"]."</td><td>".$row["date"]."</td></tr>";
	}
	echo "</tbody></table>";
	
	mysqli_close($connection);
	}
	?>
	<div class='js-element'></div>
	<canvas class = "chart" id="myChart" width="400" height="200"></canvas>
	<button class = "button1">Кнопка</button>
	
	
	
	<div id="pager" class="pager"> 
	<form> 
		<img src="first.png" class="first"/> 
		<img src="prev.png" class="prev"/> 
		<input type="text" class="pagedisplay"/> 
		<img src="next.png" class="next"/> 
		<img src="last.png" class="last"/> 
		<select class="pagesize"> 
			<option selected="selected"  value="10">10</option> 
			<option value="20">20</option> 
			<option value="30">30</option> 
			<option value="40">40</option> 
		</select> 
	</form> 
</div> 
   <div class = "res" id="res"></div>
	<script type="text/javascript" src="jquery.tablesorter.pager.js"></script>
	
<form class="form1" action="stats1.php" method="POST">
<input type="TEXT" id = "name" name="name">
<input type="TEXT" id = "surname" name="surname">
<input type="TEXT" id = "coacher" name="coacher">
<input type="TEXT" id = "age" name="age">
<input type='submit' id = 'button' value='Отправить'>
</form>
	<script type="text/javascript">
		$(document).ready(function() { 
    $("#mytable1") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
}); 
		
		$(document).ready(function() { 
    $("#mytable2") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
}); 
    </script>
	
</body>
</html>