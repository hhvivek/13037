<?php 
session_start();

if(isset($_SESSION['myusername']))
{
    include 'config.php';
    $myusername = $_SESSION['myusername'];
    
    $row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$myusername."'"));
    if($row['type']=='employee')
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

if( isset($_POST['submit']) )
     {
         
          if($_POST['name']=='' || $_POST['dob']=='' || $_POST['gender']=='' || $_POST['city']=='' || $_POST['street']=='' || $_POST['state']=='' || $_POST['mobile']=='' || $_POST['email']=='' || $_POST['pcode']=='')
          {
              echo "<script>
              alert('Looks like that you had left any blank field');
              </script>"; 
          }
          else
          {  
              mysql_query("UPDATE admin SET name='".$_POST['name']."', salary='".$_POST['salary']."', gender='".$_POST['gender']."', dob='".$_POST['dob']."', mobile='".$_POST['mobile']."', email='".$_POST['email']."', street='".$_POST['street']."', city='".$_POST['city']."',state='".$_POST['state']."',pcode='".$_POST['pcode']."', password='".$_POST['password']."' where id='".$_POST['id']."'");
              echo "<script>
              alert('Your profile is updated');
              </script>";
          }
     }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | View/Modify Manager</title>
<?php include 'header.php'; ?>
<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">View/Modify Manager</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">View/Modify Manager</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View/Modify employee</h4>
                            </div>
    
            
                                        
                                <?php if(!isset($_GET['id']))    
                                {
                                    ?>
                                
                                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                    <thead>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col>Name</th>
                                            <th scope="col" data-tablesaw-sortable-col>Email</th>
                                            <th scope="col" data-tablesaw-sortable-col>Mobile Number</th>
                                            <th scope="col" data-tablesaw-sortable-col>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                    
                                       
                                    <?php
                                    $query="SELECT * FROM admin WHERE type='manager'";
                                    $status=mysql_query($query);
                                    while($row=mysql_fetch_assoc($status))
                                    {
                                        
                                        echo '<tr><td class="title"><a href="?id='.$row['id'].'">'.$row['name'].'</a></td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['mobile'].'</td>
                                            <td>'.$row['salary'].'</td></tr>
                                              
                                        
                                        
                                        
                                        ';        
                                    } 
                                    ?>
 





</tbody>
                            </table>
                            

<?php 
}
else
{
    
                       $row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE id='".$_GET['id']."'"));
        
?>




                               <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            
                            <div class="card-block">      
                                <form method="POST" action="modify-employee.php">
                                    <div class="form-body">
                                        <h3 class="card-title">Person Info</h3>
                                        <hr>
                                        
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="text" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                   <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile No.</label>
                                                    <input type="tel" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email ID</label>
                                                    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                         <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" name="street" value="<?php echo $row['street']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name="state" value="<?php echo $row['state']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pin Code</label>
                                                    <input type="text" name="pcode" value="<?php echo $row['pcode']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                        <h3 class="box-title m-t-40">Account details</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>username</label>
                                                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" value="" class="form-control">
                                                </div>
                                            </div>   
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i>Edit</button>
                                        <button type="button" name="clear" class="btn btn-inverse">Clear</button>
                                    </div>
                                </form>

                       
                    
                
                
                
                
                





<?php 
}
?>

                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
               
                
            </div>
           
<?php include 'footer.php'; ?>