<?php

session_start();

if( isset($_POST['myusername']) )
{
     include 'config.php';

     $myusername=$_POST['myusername']; 
     $mypassword=$_POST['mypassword']; 

     $sql="SELECT * FROM admin WHERE username='$myusername' AND password='$mypassword'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);

     if($count==1)
     {
          $_SESSION["myusername"]=$myusername;

          echo"<script type='text/javascript'>
          window.location.href='dashboard.php';
          </script>";
     }
     else
     {
          $sql="SELECT * FROM admin WHERE email='$myusername' AND password='$mypassword'";
          $result=mysql_query($sql);
          $count=mysql_num_rows($result);

          if($count==1)
          {
               $sql="SELECT username FROM admin WHERE email='$myusername'";
               $result=mysql_query($sql);
               $myusername=mysql_result($result,0);

               $_SESSION["myusername"]=$myusername;

               echo"<script type='text/javascript'>
               window.location.href='dashboard.php';
               </script>";
          }
          else
          {
               echo"<script type='text/javascript'>
               alert('The username or password you entered is incorrect');
               window.location.href='login.php';
               </script>";
          }
     }
}
else
{
     echo"<script type='text/javascript'>
     alert('Oops something went wrong');
     window.location.href='login.php';
     </script>";
}
?>