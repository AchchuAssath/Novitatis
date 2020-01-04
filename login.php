<!--<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style type="text/css">
table{
	border-collapse:collapse;
	width:100%;
	color:#d96459;
	font-family:monospace;
	font-size:25px;
	text-align:left;
	}
</style>
</head>
<body>
	<table>
		<tr>
			
			<th>email</th>
			<th>password</th>	
			<th>type</th>
			
		</tr>
	
<?php
	//$firstName=$_POST['firstName'];
	//$lastName=$_POST['lastName'];
	//$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	//$number=$_POST['number'];
	$type=$_POST['type'];

	//database connection

	$conn=new mysqli('localhost','root','12nadisha57','test');
	if($conn->connect_error){
	die('Connection Faild : '.$conn->connect_error);
	}
	else{
		$stmt=$conn->prepare("insert into login(email,password,type) 
		values(?,?,?)");
		$stmt->bind_param("sss",$email,$password,$type);
		$stmt->execute();
		echo"registration successfully";
		$stmt->close();
		//$conn->close();
	}

$sql="SELECT email,password,type from login";
	$result=$conn->query($sql);

	if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
	echo "</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["type"]."</td></tr>";
	}
	echo "</table>";
	}
	else{
	echo "0 result";
	}
	$conn->close();
?>

	</table>
</body>
</html>-->


<?php

	$email=$_POST['email'];
	$password=$_POST['password'];
	$type=$_POST['type'];

	$email=stripcslashes($email);
	$password=stripcslashes($password);
	$type=stripcslashes($type);

	$email=mysql_real_escape_string($email);
	$password=mysql_real_escape_string($password);
	$type=mysql_real_escape_string($type);
	
	$conn=new mysqli('localhost','root','12nadisha57','test');

	$result=mysql_query("select *from login where email='$email' and password='$password'") or die("Failed to query database".mysql_error());
	$row=mysql_fetch_array($result);
	if($row['email']==$email &&  $row['password']==$password){
	echo "success".$row['email'];
	}else{
	echo "failed";
}
?>
