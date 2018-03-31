<?php 
session_start();

if(isset($_SESSION['myusername']))
{
    include 'config.php';
    $myusername = $_SESSION['myusername'];
    
    $row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$myusername."'"));
    if($row['type']!='admin')
    {
        session_destroy();
        echo"<script type='text/javascript'>
        alert('DAMN!!');
        window.location.href='login.php';
        </script>";
    }
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='login.php';
     </script>";
}

if( isset($_POST['name']) )
     {
          if($_POST['name']=='' || $_POST['salary']=='' || $_POST['dob']=='' || $_POST['gender']=='' || $_POST['mobile']=='' || $_POST['username']=='' || $_POST['password']=='' || $_POST['email']=='')
          {
              echo "<script tye='text/javascript'>
              alert('Looks like that you had left any blank field');
              </script>"; 
          }
          else
          {
              $row=mysql_num_rows(mysql_query("SELECT username FROM admin WHERE username='".$_POST['username']."' OR email='".$_POST['email']."'  OR mobile='".$_POST['mobile']."' "));
              if($row==0)
              {
              mysql_query("INSERT INTO `admin` (`id`, `img`, `name`, `salary`, `gender`, `dob`, `mobile`, `email`, `street`, `city`, `state`, `pcode`, `username`, `password`, `type`) VALUES (NULL, 'NULL', '".$_POST['name']."', '".$_POST['salary']."', '".$_POST['gender']."', '".$_POST['dob']."', '".$_POST['mobile']."', '".$_POST['email']."', '', '', '', '', '".$_POST['username']."', '".$_POST['password']."', 'manager');");
              echo "<script type='text/javascript'>
              alert('profile is created');
              </script>";
              }
              else 
              {
            echo "<script type='text/javascript'>
              alert('already exist');
              </script>";
              }
              
          }
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Add MAnager</title>
<?php include 'header.php'; ?>

        <div class="page-wrapper">
            
            <div class="container-fluid">
               
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Manager</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Add Manager</li>
                        </ol>
                    </div>
                </div>
                <!-- Row -->
                
                
                
                
                
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Manager</h4>
                            </div>
                            <div class="card-block">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-body">
                                        <h3 class="card-title">Person Info</h3>
                                        <hr>
                                        
                                      
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="text" name="salary" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                   <input type="text" name="gender" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" name="dob" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile No.</label>
                                                    <input type="tel" name="mobile" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email ID</label>
                                                    <input type="email" name="email" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <h3 class="box-title m-t-40">Account details</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>username</label>
                                                    <input type="text" name="username" value="" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                                    <input type="hidden" name="role" value="manager" class="form-control" required>
                                                
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                                        <button type="button" name="clear" class="btn btn-inverse">Clear</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                   </div>
                </div>
                    
                
                
                
                
                
                
                
                
                
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>