<?php

session_start();

if(!isset($_SESSION["un"]))
{

	
	header("Location:signin.php");
	
	

}

?>



<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Archive</title>
        <style>
		      body{
				  margin: 0 auto;
			  }
              .main-content{
				  margin:0 auto;
                  height: 600px;
                  width: 100%;
                  background-color:#d9dcde;
              }
              .afternav{
				  margin:0px;
			  }
			  p{
				 
                 margin: 0px;
				 padding: 0px;
			  }
			  table, tbody, tr, th, td{
                padding-left:50px;
              }
        </style>

		<!--<style>
		    .main-content{
                  height: 600px;
                  width: 100%;
                  }
		</style>-->







</head>
<body>

<?php

require_once("menu.php");

?>

<div class = "main-content">

<p style="font-size:20px; padding-left:350px"><br><br><br><b>Practice problems<b></p>

<div class="col-sm-8 pbs">
  <br><br>
  <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
     <th>ID</th>
     <th>Problem Name</th>
    <!-- <th>Author</th> -->
    </tr>
    </thead>
    <tbody>


<?php

include("config.php");

error_reporting(0);

if(isset($_POST['pname']))
{
	$pn=$_POST['pname'];
	$pd=$_POST['description'];
	//$author=$_SESSION['un'];
	$tc=$_POST['case'];
	$ac=$_POST['result'];
}

error_reporting(0);

if(isset($pn))
{


$sql="INSERT INTO archieve VALUES('','$pn','$pd','$tc','$ac','')";

$sq=mysqli_query($con,$sql);

/*if($sq)
{
	$last_id=mysqli_insert_id($con);
}
*/

$per_page=10;

if(isset($_GET['page']))
{
	$page=$_GET['page'];
}
else
{
	$page=1;
}

$start=($page-1)*$per_page;

$show="SELECT * FROM archieve limit $start,$per_page"; //start from 0 index
$send=mysqli_query($con,$show);


while($row=mysqli_fetch_array($send))
{
	echo "

   
	<tr><td>$row[id]</td><td><a href=\"description.php?id=$row[id]\"><div class=\"\">$row[pbname]</div></a></td></tr>";


	
}
echo "</tbody>
</table>
</div>";
$psql="SELECT * FROM archieve";
$sn=mysqli_query($con,$psql);
$total_rows=mysqli_num_rows($sn);
$total_page=ceil($total_rows/$per_page);

    $c="active";

	echo "<div class=\"container\"><div class=\"pagination\"><<a href=\"problems.php?page=1\">First Page</a>";

	for ($i=1; $i <$total_page ; $i++) {
	    
		if($page==$i)
		{
			$c="active";
        }
        else
        {
        	$c="";
        }
		echo "<div class=\"$c\"><a href=\"problems.php?page=$i\">$i</a></div>";
	}


	echo "<div><a href=\"problems.php?page=$total_page\">Last Page</a></div></div></div>";

}

if(!isset($pn))
{
    $per_page=10;

	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}

	$start=($page-1)*$per_page;

	$show="SELECT * FROM archieve limit $start,$per_page";




    $send=mysqli_query($con,$show);



	while($row=mysqli_fetch_array($send))
	{
		echo "

    
	  <tr><td>$row[id]</td><td><a href=\"description.php?id=$row[id]\"><div class=\"\">$row[pbname]</div></a></td></tr>";

	}

echo "</tbody>
</table>
</div>";

	$psql="SELECT * FROM archieve";
	$sn=mysqli_query($con,$psql);
	$total_rows=mysqli_num_rows($sn);
	$total_page=ceil($total_rows/$per_page);
	$c="active";

	echo "<br><br><br><br><br><br><br><br><br><br>";
	
	echo "<a href=\"problems.php?page=1\" style='text-decoration:none; padding-left:250px' >First Page   </a>";

	for ($i=1; $i <$total_page ; $i++) {
	    
		if($page==$i)
		{
			$c="active";
        }
        else
        {
        	$c="";
        }
		echo "<li class=\"$c\"><a href=\"problems.php?page=$i\">$i</a></li>";
	}

	echo str_repeat('&nbsp;', 5);
	
	echo "<a href=\"problems.php?page=$total_page\" style='text-decoration:none' >Last Page</a>";

	
}





?>

</div>

	<div class="col-sm-2">

	</div>


</div>

<?php

require_once("footer.php");

?>

</body>
</html>