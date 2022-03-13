<?php
session_start();

require_once("config.php");

if(!isset($_SESSION['un']))
{
  header("Location:signin.php");
}
if(isset($_SESSION['un']))
{
  $username=$_SESSION['un'];
}
?>



<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Run Code</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
		   
           .main{
               height: 1000px;
               width: 100%;
               background-color:#d9dcde;
           }
           
        </style>






</head>
<body>
<div class="main">
<?php

include("menu.php");

?>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Code Compiler</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>

<div class="row cspace">
<div class="col-sm-8">


<?php

if($_POST['code'])
{


$lang=$_POST['language'];
$source=$_POST['code'];
$pb=$_POST['pbn'];
$pid=$_POST['id'];
$us=$_SESSION['un'];


$isql="SELECT tc FROM archieve WHERE id='$pid'";
$si=mysqli_query($con,$isql);
$r4=mysqli_fetch_array($si);


    putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="a.exe";
	$code=$_POST["code"];
	$input=$r4['tc'];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;

	$check=0;



	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); 
	exec("cacls  $filename_error /g everyone:f");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);


    $sql="SELECT output FROM archieve WHERE id='$pid'";

    $sq=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($sq);


	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$output=shell_exec($out);
		}


		
		        echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-success\"><strong>Compilation Successful!</strong>Submit to judge</div></div><div class=\"col-sm-2\"></div></div><br>";
	            echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><form action=\"allsubmission.php\" method=\"POST\"><input type=\"hidden\" name=\"pb\" value=\"$pb\"><input type=\"hidden\" name=\"id\" value=\"$pid\"><input type=\"hidden\" name=\"mid\" value=\"$nid\"><input type=\"hidden\" name=\"vd\" value=\"$fr\"><textarea style=\"display:none\" name=\"result\" rows=\"10\" cols=\"10\">$output</textarea><input class=\"btn btn-success tm\" type=\"submit\" value=\"Submit Code\"> </div><div class=\"col-sm-2\"></div></div>";

	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$output=shell_exec($out);
		}



		         echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-success\"><strong>Compilation Successful!</strong>Submit to judge</div></div><div class=\"col-sm-2\"></div></div><br>";
	             echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><form action=\"allsubmission.php\" method=\"POST\"><input type=\"hidden\" name=\"pb\" value=\"$pb\"><input type=\"hidden\" name=\"id\" value=\"$pid\"><input type=\"hidden\" name=\"mid\" value=\"$nid\"><input type=\"hidden\" name=\"vd\" value=\"$fr\"><textarea style=\"display:none\" name=\"result\" rows=\"10\" cols=\"10\">$output</textarea><input class=\"btn btn-success tm\" type=\"submit\" value=\"Submit Code\"> </div><div class=\"col-sm-2\"></div></div>";
	}
	else
	{
		echo "<pre>$error</pre>";
		$check=1;
			echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-danger\"><strong>Compilation Error!</strong></div></div><div class=\"col-sm-2\"></div></div><br>";
	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");
    

	if($check==0)
	{

        $nsql="INSERT into code VALUES('$us','$source','')";
		$usql="UPDATE archieve SET uoutput='$output' WHERE id='$pid'";
		$csql="SELECT uoutput FROM archieve WHERE id='$pid'";
		$q3="SELECT id FROM code ORDER BY id DESC ";
		$snq=mysqli_query($con,$nsql);
		$snd=mysqli_query($con,$usql);
		$cnd=mysqli_query($con,$csql);
		$sq3=mysqli_query($con,$q3);
		$r2=mysqli_fetch_array($cnd);
		$r4=mysqli_fetch_array($sq3);




		$uo=$r2['uoutput'];
		$ac=$row['output'];
		$nid=$r4['id'];

		
		if(strcmp($uo,$ac)==0)
		{
		  $fr="";
		}
		else
		{
		  $fr="";
		}


	}


	




}

else if($_POST['src'])
{


    require_once("connection.php");
    
	$lang=$_POST['language'];
	$source=$_POST['src'];
	$pb=$_POST['pbn'];
	$pid=$_POST['id'];
	$us=$_SESSION['un'];
	$check=0;

	$isql="SELECT tc FROM element WHERE pbid='$pid'";
	$si=mysqli_query($con,$isql);
	$r4=mysqli_fetch_array($si);





	putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="a.exe";
	$code=$_POST["src"];
	$input=$r4['tc'];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error; 
	
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	
	exec("cacls  $executable /g everyone:f"); 
	exec("cacls  $filename_error /g everyone:f");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);



	$sql="SELECT output FROM element WHERE pbid='$pid'";
    $sq=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($sq);




	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out); 
		}
		else
		{
			$out=$out." < ".$filename_in;  
			$output=shell_exec($out);
		}
		
         echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-success\"><strong>Compilation Successful!</strong>Submit To Judge</div></div><div class=\"col-sm-2\"></div></div><br>";
	     echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><form action=\"allsubmission.php\" method=\"POST\"><input type=\"hidden\" name=\"pb\" value=\"$pb\"><input type=\"hidden\" name=\"id\" value=\"$pid\"><input type=\"hidden\" name=\"mid\" value=\"$nid\"><input type=\"hidden\" name=\"vd\" value=\"$fr\"><textarea style=\"display:none\" name=\"result\" rows=\"10\" cols=\"10\">$output</textarea><input class=\"btn btn-success tm\" type=\"submit\" value=\"Submit Code\"> </div><div class=\"col-sm-2\"></div></div>";

	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		
		 echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-success\"><strong>Compilation Successful!</strong>Submit to judge</div></div><div class=\"col-sm-2\"></div></div><br>";
	     echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><form action=\"allsubmission.php\" method=\"POST\"><input type=\"hidden\" name=\"pb\" value=\"$pb\"><input type=\"hidden\" name=\"id\" value=\"$pid\"><input type=\"hidden\" name=\"mid\" value=\"$nid\"><input type=\"hidden\" name=\"vd\" value=\"$fr\"><textarea style=\"display:none\" name=\"result\" rows=\"10\" cols=\"10\">$output</textarea><input class=\"btn btn-success tm\" type=\"submit\" value=\"Submit Code\"> </div><div class=\"col-sm-2\"></div></div>";

	}
	else
	{
		echo "<pre>$error</pre>";
		$check=1;

		echo "<div class=\"row\"><div class=\"col-sm-5\"></div><div class=\"col-sm-5\"><div class=\"alert alert-danger\"><strong>Compilation Error!</strong></div></div><div class=\"col-sm-2\"></div></div><br>";
	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");




    if($check==0)
    {

            $nsql="INSERT into code VALUES('$us','$code','')";
			$usql="UPDATE element SET uoutput='$output' WHERE pbid='$pid'";
			$csql="SELECT uoutput FROM element WHERE pbid='$pid'";
			$q3="SELECT id FROM code ORDER BY id DESC ";
			$snq=mysqli_query($con,$nsql);
			$snd=mysqli_query($con,$usql);
			$cnd=mysqli_query($con,$csql);
			$sq3=mysqli_query($con,$q3);
			$r2=mysqli_fetch_array($cnd);
			$r4=mysqli_fetch_array($sq3);




			$uo=$r2['uoutput'];
			$ac=$row['output'];
			$nid=$r4['id'];




    }

    

}
?>

</div>
<div class="col-sm-4">

</div>
</div>
</div><br><br><br>
<?php

include("footer.php");

?>



</body>
</html>