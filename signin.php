<?php

session_start();

if(isset($_SESSION["un"]))
{
  header("Location:problems.php");
}

?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>sign in</title>
        <style>
              .main-content{
                  height: 600px;
                  width: 100%;
                  background-color:#d9dcde;
              }
              .form {
                  border-radius: 5px;
                  padding: 100px;
              }
              input{
                  background-color:#bfbfbf;
              }
              
              input[type=email] {
                                   
                  width: 70%;
                  padding: 8px 20px;
                  margin: 2px 0;
                  box-sizing: border-box;
                  
              }
              input[type=text] {
                  width: 70%;
                  padding: 8px 20px;
                  margin: 2px 0;
                  box-sizing: border-box;
              }
              input[type=password] {
                  width: 70%;
                  padding: 8px 20px;
                  margin: 2px 0;
                  box-sizing: border-box;
                 
              }
              button[type=submit] {
                  color: white;
                  background-color:#1b6917;
                  font-weight: bold;
                  width: 12%;
                  padding: 12px 10px;
                  margin: 50px 0;
                  box-sizing: border-box;
                  border-radius: 15px;
              }
              button[type=submit]:hover, active{
                  background-color:#0f4218;
                  
              }
              lebel{
                  font-weight: bold;
              }
        </style>
</head>
<body>
<div class="main">

<?php

      include("menu.php");

?>
<div class="main-content">
  <div class = "form">
    <form action="process.php" name="f1" method="POST">
        <label for="username" style = "font-weight: bold">Username</label><br>
        <input type="text" name="un" class="form-control" placeholder="Enter Username" required><br>
        <br><label for="password" style = "font-weight: bold;">Password</label><br>
        <input type="password" class="form-control"  name="ps" placeholder="Enter Password" required><br>

        <button type="submit" class="btn">Sign In</button>
	

    </form>
  </div>
  
</div>





<?php

include("footer.php");

?>
</div>

</body>
</html>


