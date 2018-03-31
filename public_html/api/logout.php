<?php
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['myusername']))
{
    include '../config.php';
    $myusername = $_POST['myusername'];
    $cin = urldecode($_POST['cin']);
     mysql_query("INSERT INTO `attendance` (`id`, `cin`, `cout`, `latti`,`longi`,`username`) VALUES (NULL,'".$cin."',CURRENT_TIMESTAMP,'28.474388','77.503990','".$myusername."');");
  

}
else
{
     echo"Auth failed";
}
?>