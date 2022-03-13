<?php

session_start();
require_once("config.php");

if(!isset($_SESSION['aun']))
{
	header("Location:signin.php");
}
if(isset($_SESSION['aun']))
{
	$username=$_SESSION['aun'];
}
?>





<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Add Problems</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        



</head>
<body>
<div class="main">
<?php

require_once("amenu.php");

?>


<div class="row log">
<div class="col-sm-10">
<div class="" ><h3 style="padding-left:300px"><br><br>ADD A PROBLEM (-_-)</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">


<form action="addproblem.php" name="f2" method="POST">
<!--<div class="forform" style="padding-left:100px">
   <label for="id">Add Problem ID</label>
   <input type="number" name="id" class="form-control" ><br><br>

   <label for="pbname"  >Add Problem Name</label>
   <input type="text" name="pbname" class="form-control" ><br><br>

   <label for="pbdes"><b>Add Problem Description</b></label>
   <input type="file" id="file" name="pbdes" multiple><br><br>

   <label for="tc"><b>Add Problem Testcase</b></label>
   <input type="file" id="file" name="tc" multiple><br><br>

   <label for="output"><b>Add Problem Output</b></label>
   <input type="file" id="file" name="output" multiple><br><br>

   <label for="uoutput"><b>Add Problem Output</b></label>
   <input type="file" id="file" name="uoutput" multiple><br><br>

   <button>Submit</button>
 </div>
</form> -->

<label for="id">Add Problem ID</label>
<input type="number" name="id" class="form-control" ><br><br>

<label for="pbname"  >Add Problem Name</label>
<input type="text" name="pbname" class="form-control" ><br><br>



<div class="form-group col-md-12 col-sm-12 col-xs-12">
<div class="field-label">Description</div>
<textarea name="pbdes"  placeholder="Enter Description" required></textarea>
</div> 

<div class="form-group col-md-12 col-sm-12 col-xs-12">
<div class="field-label">Add Testcase</div>
<textarea name="tc"  placeholder="Enter Testcase" required></textarea>
</div> 

<div class="form-group col-md-12 col-sm-12 col-xs-12">
<div class="field-label">Add output</div>
<textarea name="output"  placeholder="Enter Output" required></textarea>
</div> 

<div class="form-group col-md-12 col-sm-12 col-xs-12">
<div class="field-label">Add Uoutput</div>
<textarea name="uoutput"  placeholder="Enter Uoutput" required></textarea>
</div>

<button type="submit" class="btn">Add All Problem Data</button>


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
