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
        window.location.href='/login.php';
        </script>";
    }
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='login.php';
     </script>";
}

if( isset($_GET['id']) )
     {
       mysql_query("DELETE FROM admin WHERE id='".$_GET['id']."'");
             
      echo "<script>
              alert('User Deleted Successfully');
              </script>";   
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Remove Employee</title>
<?php include 'header.php'; ?>

        <div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Remove Employee</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Remove Employee</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Remove Employee</h4>
                            </div>

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
                                    $query="SELECT * FROM admin WHERE type='employee'";
                                    $status=mysql_query($query);
                                    while($row=mysql_fetch_assoc($status))
                                    {
                                        
                                        echo '<tr>
                                            
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['mobile'].'</td>
                                            <td>'.$row['salary'].'</td>
                                            <td class="title"><a href="?id='.$row['id'].'">Remove</a></td>
                                              </tr>
                                              
                                        
                                        
                                        
                                        ';        
                                    } 
                                    ?>
 





</tbody>
                            </table>
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