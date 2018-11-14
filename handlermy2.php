<?php if(isset($_POST['fdate']) && isset($_POST['sdate']) && isset($_POST['distance']) && isset($_POST['name']) && isset($_POST['surname'])&&isset($_POST['age'])&&isset($_POST['coach'])){
$connection = mysqli_connect('127.0.0.1','root','lolik228','InfoPlov');
$fdate = $_POST['fdate'];
$sdate = $_POST['sdate'];
$distance = $_POST['distance'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$coach = $_POST['coach'];
if ($fdate<$sdate){
$date_more=mysqli_query($connection,"SELECT `date`,`time` FROM `Plov` WHERE `distance`='$distance' AND `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coach' AND `date`>'$fdate' AND `date`<'$sdate' ORDER BY date ASC");}
if ($sdate<$fdate){
$date_more=mysqli_query($connection,"SELECT `date`,`time` FROM `Plov` WHERE `distance`='$distance' AND `Name`='$name' AND `Surname`='$surname' AND `Age`='$age' AND `Coacher`='$coach' AND `date`>'$sdate' AND `date`<'$fdate' ORDER BY date DESC");}
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
}
?>