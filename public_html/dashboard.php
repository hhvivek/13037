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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Dashboard</title>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                
                <?php if($row['type']=='employee')
                        {
                            echo"<script type='text/javascript'>
                            window.location.href='profile.php';
                            </script>";
                        }
                        ?>
                
                
                
                <?php 
                
                $dash_data = mysql_query("SELECT * FROM attendance");
                
                    
                ?>
                    
                <table id="myTable" class="display" style="width:100%"><thead><tr><th>Date</th><th>Employee ID</th><th>Check in</th><th>Check out</th><th>Latitute,Longitude</th><th>Action</th></tr></thead><tbody>
                    
                    <?php
                    while($dash_row= mysql_fetch_assoc( $dash_data)){
                    ?>
                    <tr>
                        <td><?php echo $dash_row['cin'];  ?></td>
                        <td><?php echo $dash_row['username'];  ?></td>
                        <td><?php echo $dash_row['cin'];  ?></td>
                        <td><?php echo $dash_row['cout'];  ?></td>
                        <td><?php echo $dash_row['latti'];  ?>,<?php echo $dash_row['longi'];  ?></td>
                        <td><a target="_blank" href="https://www.google.com/maps/?q=<?php echo $dash_row['latti'];  ?>,<?php echo $dash_row['longi'];  ?>">View location on Map</a></a></td>
                    </tr>
  
                    <?php  
                    }
                    ?>
                    
                    <tfoot>
                        <tr><th>Date</th><th>Employee ID</th><th>Check in</th><th>Check out</th><th>Latitute,Longitude</th><th>Action</th></tr>
                    </table>
                
                
                
                
                
                
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>