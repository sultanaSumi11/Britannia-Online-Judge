<?php

require_once("config.php");

$ID=$_POST['id'];
$PNAME=$_POST['pbname'];
$DES=$_POST['pbdes'];
$TC=$_POST['tc'];
$OUTPUT=$_POST['output'];
$UOUTPUT=$_POST['uoutput'];

$query="INSERT into archieve(id,pbname,pbdes, tc, output, uoutput) VALUES('$ID','$PNAME','$DES','$TC', '$OUTPUT', '$UOUTPUT')";
$sq=mysqli_query($con,$query);



if($sq)
{
	echo "Successfully added the problem!";
}
else
{
	echo("Failed<br>");
}






?>