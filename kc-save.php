<?php 
	$kcName = $_POST['kcName'];
	$kcTime = $_POST['kcTime'];
	echo $kcName;
	echo $kcTime;
	$sql = "INSERT INTO `kecheng`(`课程名`,`时间`) VALUES ('{$kcName}','{$kcTime}')";
	echo $sql;
	include "conn.php";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "执行成功";
	}else{
		echo "执行失败";
	}
?>
	
