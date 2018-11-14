<!DOCTYPE html>
<meta charset="UTF-8" />

<html>
<head>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 
	
	<style>
	
		
		
		.block {padding: 5px 50px;}

.block:hover::after{
	content: attr(data-title);
	 position: absolute; /* Абсолютное позиционирование */
    left: 63%; top: 1%; /* Положение подсказки */
    z-index: 1; /* Отображаем подсказку поверх других элементов */
    background: rgba(255,255,230,0.9); /* Полупрозрачный цвет фона */
    font-family: Arial, sans-serif; /* Гарнитура шрифта */
    font-size: 16px; /* Размер текста подсказки */
    padding: 5px 10px; /* Поля */
    border: 1px solid #333; /* Параметры рамки */
}
	</style>
	<style>
	table.tablesorter .header {
	background-repeat: no-repeat;
	
	padding-left: 30px;
	padding-top: 8px;
	height: auto;
}
table.tablesorter .headerSortUp {
	background-repeat: no-repeat;
}
table.tablesorter .headerSortDown {
	background-repeat: no-repeat;
}
	</style>
	<style >
		   .sidenav{
		       height: 0;
			   width: 100%;
			   position: fixed;
			   z-index: 1;
			   top: 0;
			   left: 0;
			   background-color: midnightblue;
			   overflow-x: hidden;
			   padding-top: 0px;
			   transition: 0.5s;
		   }
		.sidenav a
		{
			padding: 8px;
			
			text-decoration: none;
			font-size: 12px;
			color: blanchedalmond;
			background-color: darkcyan;
			display:block;
			transition: 0.3s;
		}
		.name a
		{
			background-color: darkred;
			display:flex;
			top: 0px;
			
		}
		.sidenav a:hover
		{
			color: darkgrey;
			
		}
		.sidenav .closebtn
		{
			position: absolute;
			background-color: midnightblue;
			top: 0;
			right: 1px;
			font-size: 25px;
			margin-left: 0px;
		}
		</style>
</head>
	<body>
		<div id = 'mySidenav' class = 'sidenav'>
		<a href = 'javascript:void(0)'
		   class = 'closebtn'
		   onclick = 'closeNav()'>&times;</a>
			<form action="index.php" method="POST">
<input type="TEXT" name="type">
<input type="TEXT" name="name">
			<input type="TEXT" name="surname">
			<input type="TEXT" name="coacher">
			<input type="TEXT" name="age">
			<input type='submit' value='Отправить'>
</form>
			
		
		</div>
		<form action="index.php" method="POST">
<input type="TEXT" name="type">
<input type="TEXT" name="name">
			<input type="TEXT" name="surname">
			<input type="TEXT" name="coacher">
			<input type="TEXT" name="age">
			<input type='submit' value='Отправить'>
</form>
		
		<div id = "main">
				<?php	
			
			if (isset($_POST['type']) && isset($_POST['name'])&& isset($_POST['surname']) && isset($_POST['coacher'])&& isset($_POST['age']))
{
				
$str_out =$_POST['type'];				
$name =  $_POST['name'];
$age = $_POST['age'];
$surname = $_POST['surname'];		
$coacher = $_POST['coacher'];
}
			
			$connection = mysqli_connect('127.0.0.1','root','lolik228','InfoPlov');
		
	if ($connection==false)
	{
		echo mysqli_connect_error();
		exit();
	}
	


		
		
mysqli_query($connection,"SET NAMES 'utf8'");	
mysqli_query($connection,"SET CHARACTER SET 'utf8'");

		
		
if ($str_out!=null && $name != null && $surname!=null && $age!=null && $coacher!=null)
{
$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE Name like '$name%' and Surname like '$surname%' and Age like '$age%' and distance = '$str_out' and Coacher like '$coacher%'");
}
			else if ($str_out==null && $name != null && $surname!=null && $age!=null && $coacher!=null)
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE Name like '$name%' and Surname like '$surname%' and Age like '$age%' and Coacher like '$coacher%'");
			}
			else if ($str_out!=null && $name == null && $surname==null && $age==null && $coacher==null)
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE distance = '$str_out'");
			}
			else  
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov`");
				$name = null;
				$surname = null;
				$age = null;
				$coacher  = null;
			}
	
			
			
$row1 = mysqli_fetch_array($result);

//if ($name != null && $surname!=null && $age!=null && $coacher!=null)
//{
//echo "<a>$name\n$surname\n$age\n"."".$row1["Success"]."\n"."".$row1["Coacher"].""."</a>"."\n";

			//echo "<div id = 'mySidenav' class = 'sidenav'>
			//<div class = 'name'>
			//<a>"."".$row1["Name"]." ".$row1["Surname"]." ".$row1["Success"]." "."</a>
			//</div>
		//<a href = 'javascript:void(0)'
		   //class = 'closebtn'
		   //onclick = 'closeNav()'>&times;</a>
			//<a href='#'>Distance</a>
			//<a href='http://kokoriki.ru/stats.php'>Statistic</a>
			
		
		//</div>";
//}
			//else 
			//{
				//echo "<div id = 'mySidenav' class = 'sidenav'>
		//<a href = 'javascript:void(0)'
		  // class = 'closebtn'
		 //  onclick = 'closeNav()'>&times;</a>
			//<a href='#'>Distance</a>
			//<a href='http://kokoriki.ru/stats.php'>Statistic</a>
			//</div>";
			//}
			
		

if ($str_out!=null && $name != null && $surname!=null && $age!=null && $coacher!=null)
{


$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE Name like '$name%' and Surname like '$surname%' and Age like '$age%' and distance = '$str_out' and Coacher like '$coacher%'");
}
			else if ($str_out==null && $name != null && $surname!=null && $age!=null && $coacher!=null)
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE Name like '$name%' and Surname like '$surname%' and Age like '$age%' and Coacher like '$coacher%'");
			}
			else if ($str_out!=null && $name == null && $surname==null && $age==null && $coacher==null)
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov` WHERE distance = '$str_out'");
			}
	else 
			{
				$result=mysqli_query($connection,"SELECT * FROM `Plov`");
		        $name = null;
				$surname = null;
				$age = null;
				$coacher  = null;
			} 		
		
		
echo "<table width='850' border='0' cellpadding = '0' cellspacing='0' id = 'mytable' class = 'tablesorter'>
<thead>

<tr>

<th>Дистанция</th>
<th>Время</th>
<th>Разряд</th>
<th>Информация о соревнованиях</th>
<th>Дата соревнований</th>
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
			
			
				$raz="МСМК-".$rez["МСМК"].". ".$msmk.".МС-".$rez["МС"]." ".$ms." .КМС-".$rez["КМС"]." ".$kms." .I-".$rez["I"]." ".$I." .II-".$rez["II"]." ".$II." . III-".$rez["III"]." ".$III." . I (ю)-".$rez["Iu"]." ".$ip." .II (ю)-".$rez["IIu"]." ".$iip." .III(ю)-".$rez["IIIu"]." ".$iiip;
			
			
			echo  
			"<tr><td class = block data-title = '.$raz.'>".$row["distance"]."</td>".""."<td>"."".$row["time"]."</td>"."".""."<td>"."".$row["locsuccess"]."</td>"."".""."<td>"."".$row["place"]."</td>"."".""."<td>"."".$row["date"]."</td>".""."</tr>"."";
		}
		
		
echo "</tbody>\n</table>";
		mysqli_close($connection);
?>
			<span onClick="openNav()">open</span>
			</div>
		
		
		
			


 


	<?php
	 // нажамать ctrl+u для удобочитаемого вида
 
?>
	
		<script type="text/javascript">
		$.tablesorter.addParser({ 
        // set a unique id 
        id: 'Разряд', 
        is: function(s) { 
            // return false so this parser is not auto detected 
            return false; 
        }, 
        format: function(s) { 
            // format your data for normalization 
            return s.replace(/III юн/,0).replace(/II юн/,1).replace(/I юн/,2).replace(/III/,3).replace(/II/,4).replace(/МСМК/,8).replace(/I/,5).replace(/КМС/,6).replace(/МС/,7); 
        }, 
        // set type, either numeric or text 
        type: 'numeric' 
    }); 
			</script>
	<script type="text/javascript">
    $(function() { 
        $("#mytable").tablesorter({ 
            headers: { 
                2: { 
                    sorter:'Разряд' 
                } 
            } 
        }); 
    });
    </script>
		
<script>
		function openNav()
	{
		document.getElementById("mySidenav").style.height = "60px";
	}
	function closeNav()
	{
		document.getElementById("mySidenav").style.height = "0px";
	}
		
		</script>
		
	</body>
</html>


