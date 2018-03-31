<?php

session_start();
header('Access-Control-Allow-Origin: *');  
     include '../config.php';


     $myusername=@$_POST['myusername']; 
     $mypassword=@$_POST['mypassword'];
     $role=@$_POST['role'];

     if(empty($_POST['myusername'])){
         
           print_r(json_encode(["success"=>0,"message"=>"Please enter username"]));
           die();
           
     }elseif(empty($_POST['mypassword'])){
        
        print_r(json_encode(["success"=>0,"message"=>"Please enter password"]));
        
        die();
     }

     $sql="SELECT * FROM admin WHERE username='$myusername' AND password='$mypassword'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);

     if($count==1)
     {
          $_SESSION["myusername"]=$myusername;

          print_r(json_encode(["success"=>1,"message"=>$username]));
          die();
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
               
                print_r(json_encode(["success"=>1,"message"=>$username]));
                die();


          }
          else
          {
            print_r(json_encode(["success"=>0,"message"=>"Incorrect username and password"]));
            die();

          }
     }

?>