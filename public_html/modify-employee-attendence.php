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

 mysql_query("INSERT INTO `attendance` (`id`, `cin`, `cout`, `latti`,`longi`,`username`) VALUES (NULL,'".$cin."',CURRENT_TIMESTAMP,'28.474388','77.503990','".$myusername."');");
  echo "<script type='text/javascript'>
  alert('Ticket Submited');
  </script>";
          
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Update Attendance</title>
<?php include 'header.php'; ?>

        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Attendance</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Update Attendance</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <?php
                       $row=mysql_fetch_array(mysql_query("SELECT * FROM ticket WHERE username='".$myusername."'"));
                ?>
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Update Attendance</h4>
                            </div>
                            <div class="card-block">
                                <form method="POST" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-body">
                                        
                                        
                                      
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    
                                                 <center>   
                                                   <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="u-img"><img src="<?php echo $row['img']; ?>/<?php echo $row['username']; ?>.jpg" style="width:100%" alt="user"></div>
                                                   
                                                    
            
                                                </div>
                                            </div> </center>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>User</label>
                                                    <input type="text" name="username"  class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>longitude</label>
                                                    <input type="text" name="longi"  class="form-control" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Lattitude</label>
                                                    

                                                   <input type="text" name="longi"  class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        
                                    </div>
                                </form>

                        </div>
                    </div>
                   </div>
                </div>
                    
                
                
                
                
                
                
                
                
            </div>
            
<?php include 'footer.php'; ?>