<?php if(isset($_POST['date']) && isset($_POST['distance']) && isset($_POST['name']) && isset($_POST['surname'])&&isset($_POST['age'])&&isset($_POST['coach'])){
$connection = mysqli_connect('127.0.0.1','root','lolik228','InfoPlov');
$date = $_POST['date'];
$distance = $_POST['distance'];
	    $name = $_POST['name'];
		$surname = $_POST['surname'];
		$age = $_POST['age'];
		$coach = $_POST['coach'];
$date_more=mysqli_query($connection,"SELECT `date`,`time` FROM `Plov` WHERE `distance`='$distance' AND `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coach' AND `date`>'$date' ORDER BY date ASC LIMIT 5");
if(mysqli_num_rows($date_more)>0){
    while($row_more=mysqli_fetch_array($date_more, MYSQLI_ASSOC)){ $i++;
        if($i==mysqli_num_rows($date_more)){
            $data0 = $row_more['date'].'*'.$row_more['time'];
        }else{
            $data0 = $row_more['date'].'*'.$row_more['time'].'|';
        }
        echo $data0;
    }
}
echo '#';
$date_less=mysqli_query($connection,"SELECT `date`,`time` FROM `Plov` WHERE `distance`='$distance' AND `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coach' AND `date`<'$date' ORDER BY date ASC LIMIT 5");
if(mysqli_num_rows($date_less)>0){
    while($row_less=mysqli_fetch_array($date_less, MYSQLI_ASSOC)){ $j++;
        if($j==mysqli_num_rows($date_less)){
            $data1 = $row_less['date'].'*'.$row_less['time'];}else{$data1 = $row_less['date'].'*'.$row_less['time'].'|';}
        echo $data1;}}}?>

