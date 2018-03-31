<?php 
session_start();

if(isset($_SESSION['myusername']))
{
    include 'config.php';
    $myusername = $_SESSION['myusername'];
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='login.php';
     </script>";
}

$row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$myusername."'"));


?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo $sitename; ?> | Log off</title>
    
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    
</head>

<body>
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">        
            <div class="login-box card">
                <div class="card-block">
                  <form class="form-horizontal form-material" method="POST" name="logform" action="logged.php">

                    <div class="form-group">
                      <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" class="u-img" width="100%" src="<?php echo $row['img']; ?>/<?php echo $row['username']; ?>.jpg">
                          <h3><?php echo $row['username']; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                          <input class="form-control" type="hidden" required="" value="<?php echo $row['username']; ?>" placeholder="<?php echo $row['username']; ?>" name="myusername">
                        <input class="form-control" type="password" required="" placeholder="Password" name="mypassword">
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        
    </section>
    
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>