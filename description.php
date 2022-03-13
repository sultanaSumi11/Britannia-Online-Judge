<?php

session_start();

if(!isset($_SESSION["un"]))
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
        <title>Description</title>
        <style>
              body{
                  margin:0px;
                  padding:0px;
              }
		      
              .main{
				  margin: 0px;
				  padding: 0px;
                  height: 900px;
                  width: 100%;
                  background-color:#d9dcde;
              }
              
        </style>
        

</head>
<body>
<div class="main">
<?php

require_once("menu.php");

?>


<?php

require_once("config.php");

if($_GET['id'])
{
  $problemid=$_GET['id'];
}

if(isset($_GET['name']))
{
	$problem=$_GET['name'];
	$sql="SELECT * FROM archieve WHERE pbname='$problem'";
}
else
{
  $sql="SELECT * FROM archieve WHERE id='$problemid'";
}



$sq=mysqli_query($con,$sql);

$row=mysqli_fetch_array($sq);


echo "
<div class=\"row log\">
<div class=\"col-sm-10\">
<div class=\"\"><h3 style=\"text-align:center;\"><br><br>$row[pbname]</h3></div>
</div>

<div class=\"col-sm-1\">

</div>

<div class=\"col-sm-1\">
  
</div>

</div>";


echo "

<center><div class=\"row cspace\">
<div class=\"col-sm-10\">
<br><textarea class=\"form-control\" style='padding:30px' rows=\"30\" cols=\"100\" readonly>$row[pbdes]</textarea><br></center>";


echo "<a class=\"btn btn-success\" style='margin-bottom:0px; padding-bottom:0px; padding-left:100px; display: inline-block; padding-top:10px;'  href=\"submit.php?id=$row[id]\"><br>Submit Your Code</a></div>";



?>

<div class="col-sm-2">

</div>
</div>
<br><br><br>

<?php

require_once("footer.php");

?>
</div>
</body>
</html>


