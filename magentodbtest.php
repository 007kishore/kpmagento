<?php 
	error_reporting(E_ALL);
	ini_set('display_errors','On');

	echo "before connection, time is : ".time();

	$conn = new mysqli("192.168.1.100","afixi","p455w0rd","postboxes_magento_production");
	if($conn->connect_error){
		echo $conn->connect_error;	
	}else{
		echo "<pre>";print_r($conn);echo "</pre>";
		
		$res = mysqli_query($conn, "select firstname,lastname from admin_user");
		if(mysqli_num_rows($res)>0){
			echo "present ".mysqli_num_rows($res)." no of records";
		}else{
			echo "not present";
		}
	}	
	echo "<br> After connection , Time is : ".time();
?>
