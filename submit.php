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



<?php

$c=0;

if(isset($_GET['id']))
{
   $problemid=$_GET['id'];
   $c=1;
}

$sql="SELECT * FROM archieve WHERE id='$problemid' ";

$sq=mysqli_query($con,$sql);

$row=mysqli_fetch_array($sq);




//echo "<textarea  style=\"display:none;\" name=\"in\" 

?>

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Submit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
           .main{
               height: 600px;
               width: 100%;
               background-color:#d9dcde;
           }
           .form-group{
               padding-left:50px;
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
<div class="" ><h3 style="padding-left:300px"><br><br>Submit Code</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="pcompile.php" name="f2" method="POST">
<label for="lang"  >Choose Language</label>

<select class="form-control" name="language">
<option value="c">C</option>
<option value="cpp">C++</option>
<option value="cpp11">C++11</option>
<option value="java">Java</option>

</select><br><br>

<?php

    if($c==1)
    {
       //echo "<input type=\"hidden\" name=\"pbn\" value=\"$problem\">";
    	echo "<input type=\"hidden\" name=\"id\" value=\"$problemid\">";
    }
    else
    {
    	echo"<label for=\"pp\">Enter Problem ID</label><br>";
    	//echo "<input class=\"form-control\" type=\"text\" name=\"pbn\">";
    	echo "<input class=\"form-control\" type=\"text\" name=\"id\">";
    }

 ?>

<label for="ta">Paste Your Code<br><br></label>
<textarea class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
<input type="hidden" name='pbn' value="<?php echo $row['pbname']; ?>">
<input type="submit" class="btn btn-success" value="Run Code"><br><br><br>


</form>


</div>

<div class="col-sm-4">

</div>
</div>
</div>
<br><br><br>

<?php

include("footer.php");

?>
</div>





</body>

</html>
