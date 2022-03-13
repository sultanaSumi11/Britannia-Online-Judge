<?php
$u = 0;
if(isset($_SESSION['un']))
{
  $username=$_SESSION['un'];
  $u=1;

}
?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <style>
       body {
       align:center;
       width: 70%;
       margin: 0 auto;
       }
       .menurow{
          list-style-type: none;
          margin: 0;
          overflow: hidden;
          background-color: #7b8d96;
       }
    
        ul {
          padding:16px;
          list-style-type: none;
          margin: 0;
          overflow: hidden;
          background-color: #7b8d96;
        }

        li {
          float: left;
        }

        li a {
          color: black;
          font-weight: bold;
          display:block
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover {
          color: black;
          background-color:#4e5e5e; 
        }
        li a:active {
          color: black;
          background-color: #ABAAA9;
        }
        

     
  </style>
</head>
<body>

 <!-- <div class = "logo">
     <left> <img src="header/britannia.ai" style="align:center; height:100px; weight:100px; margin-top:30px"> </left>
  </div>-->

  <div class="menurow">
  <div class = "logo">
     <center><img src="header/britannia.ai" style="align:center; height:60px; weight:80px;"> 
     <h3 style="color:#c5c6d1; margin:0"><span style="color:#020338;">B</span>ritannia <span style="color:#FFFFF7; ">P</span>racticing<span style="">Ar</span>chiev<span style="font-style: oblique;">e</span></h3> </center> 
  </div>
      <center><ul>
         <li><a href="problems.php" color="red">Problems</a>
         <li><a href="contest.php">Contest</a>
         <?php
            if($u==1)
            {
               echo "<li class=\"space2\"><a href=\"profile.php?user=$username\">$username</a>";
               echo "<li class=\"space2\"><a href=\"logout.php\">Log Out</a>";
            }
            else
            {
               echo "<li class=\"space2\"><a href=\"signin.php\">Sign In</a>";
               echo "<li class=\"space2\"><a href=\"signup.php\">Sign Up</a>";
            }
         ?>
         <li><a href="Britannia-Online_judge-Admin/signup.php" style="margin-left:320px">Admin</a>
      </ul></center>
  </div>
  
</body>
</html>

