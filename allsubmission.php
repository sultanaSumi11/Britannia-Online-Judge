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
        <title>All Submission</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .main{
				      margin:0 auto;
                      height: 1000px;
                      width: 100%;
                      background-color:#d9dcde;
            }
            table, tbody, tr, th, td{
                padding-left:55px;
            }
            
        </style>






</head>
<body>
<div class="main">
<?php

require_once("menu.php");

?>


<div class="row_log">
<div class="col-sm-10">
<br><br>
<p style="font-size:18px; padding-left:350px"><br><br><br><b>Practice problems<b></p>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row_space">
<div class="col-sm-1">
</div>
<div class="col-sm-9">
  <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
     <th>ID</th>
     <th>Name</th>
     <th>Problem Name</th>
     <th>Verdict</th>
    </tr>
    </thead>
    <tbody>



<?php


error_reporting(0);
if(isset($_POST['id']))
{
  $cid=$_POST['id'];
  $uo=$_POST['result'];
  $pname=$_POST['pb'];
  $nid=$_POST['mid'];
  $result=$_POST['vd'];
  
}

$ch=1;
echo "$result";
if(!isset($_POST['id']) && !isset($_GET['name']))
{
   $ch=0;
   error_reporting(0);
   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;




   $show="SELECT * FROM submission ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\"><strong style='color:green'>$row[verdict]</strong></div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }

}

  echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<br><br><br><br><br><br>";

  echo "<a href=\"allsubmission.php?page=1\" style='padding-left:300px; text-decoration:none;'>First Page</a>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<a href=\"allsubmission.php?page=$i\">$i</a>";
  }


  echo   "<a href=\"allsubmission.php?page=$total_page\" style='padding-left:50px; text-decoration:none;'>Last Page</a>";


}

if(isset($_GET['name']))
{
   $name=$_GET['name'];
   $ch=0;
   error_reporting(0);
   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;




   $show="SELECT * FROM submission WHERE sname='$name' ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\"><srtong style='color:green'>$row[verdict]</strong></div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }
}

  echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission WHERE sname='$name' ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<br><br><br><br><br><br>";

  echo "<a href=\"allsubmission.php?page=1&name=$name\" style='padding-left:300px; text-decoration:none;'>First Page</a>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<a href=\"allsubmission.php?page=$i&name=$name\">$i</a>";
  }


  echo "<a href=\"allsubmission.php?page=$total_page&name=$name\" style='padding-left:50px; text-decoration:none;'>Last Page</a>";


}





if(isset($_POST['id']))
{


  $cid=$_POST['id'];
  $uo=$_POST['result'];
  $pname=$_POST['pb'];
  $nid=$_POST['mid'];
  $result=$_POST['vd'];
  



$query="SELECT output FROM archieve WHERE id='$cid'";
$sq=mysqli_query($con,$query);
$r3=mysqli_fetch_array($sq);

$ao=$r3['output'];

  if($result!="lt")
  {
   
    if($result=="e")
    {
      $result="Compilation Error";
    }
    else if(strcmp($uo,$ao)==0)
    {
      //echo "Accepted";
      $result="Accepted";
    }
    else
    {
     //echo "Wrong Answer";
      $result="Wrong Answer";
    }
  }
  else
  {
     $result="Time Limit Exceed";
  }




   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;







$sql="INSERT INTO submission VALUES('$nid','$username','$result','$pname') ";
$show="SELECT * FROM submission ORDER BY sid DESC limit $start,$per_page";


$stq=mysqli_query($con,$sql);
$sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\" ><strong style='color:green'>$row[verdict]</strong></div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\"><strong style='color:red'>$row[verdict]</strong></div></td></tr>";
  }

}

   echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";
  echo "<br><br><br><br><br><br>";

  echo "<div class=\"contain con\"><a href=\"allsubmission.php?page=1\" style='padding-left:300px; text-decoration:none;'>First Page</a>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<a href=\"allsubmission.php?page=$i\">$i</a>";
  }


  echo "<a href=\"allsubmission.php?page=$total_page\" style='padding-left:50px; text-decoration:none;'>Last Page</a>";

}
?>




</div>

<div class="col-sm-2">

</div>
</div>
</div>
</div><br><br><br>

<?php

include("footer.php");

?>

</div>

</body>
</html>