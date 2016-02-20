<?php
?>
<html>
<body>
<form>
<input type="button" name="submit" value="submit">
</form>
</body>
</html>
<?php
/*
	$a = "hello there";
	$hello = "samir";
	echo '$a= '.$a."<br>";
	echo '$$a= '.$$a."<br>";
	//echo echo "aaaa"; //fatal error
	echo print "sssss";//sssss1
	print print "xxx";//xxx1
	print print print "hh";//hh11

$ourFileName = "here/yesaa.txt";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't oppen file");
echo fwrite($ourFileHandle,"Hello World. Testing!");
fclose($ourFileHandle);


if(fopen($ourFileName, 'r')){
	echo "asdfasdf";

}else{ die("can't opppen file");}
*/
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$conn = mysqli_connect('localhost','root','p455w0rd','kishoredb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	//echo "got";
}

$sql 		= "SELECT parent_id,firstname,lastname,email  FROM sales_flat_order_address WHERE email LIKE '%sales@thetapestore.co.uk%' group by parent_id";
$result 	= mysqli_query($conn,$sql);
//$result     = mysqli_execute($sql);
var_dump($result);exit;

foreach ($result as $line) { 
        var_dump($line); 
        echo "<br>";
        }

while($row  = mysqli_fetch_array($result)){
	$sql1 		= "SELECT customer_email  FROM sales_flat_order WHERE entity_id=".$row['parent_id']." limit 1";
	$result1 	= mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_array($result1)){
		//echo $row1['customer_email'];
		//echo "<br>";	
	}
	
}
?>
