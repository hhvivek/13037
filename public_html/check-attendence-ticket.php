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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Check-attendance Ticket</title>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Check-attendance Ticket</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Check-attendance Ticket</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Check-attendance Ticket</h4>
                            </div>
    
            
                                        
                                <?php if(!isset($_GET['id']))    
                                {
                                    ?>
                                
                                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                    <thead>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col>Username</th>
                                            <th scope="col" data-tablesaw-sortable-col>Subject</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                    
                                       
                                    <?php
                                    $query="SELECT * FROM ticket";
                                    $status=mysql_query($query);
                                    while($row=mysql_fetch_assoc($status))
                                    {
                                        
                                        echo '<tr><td class="title"><a href="?id='.$row['id'].'">'.$row['username'].'</a></td>
                                            <td>'.$row['subject'].'</td>
                                            
                                            </tr>
                                              
                                        
                                        
                                        
                                        ';        
                                    } 
                                    ?>
 





</tbody>
                            </table>
                            

<?php 
}
else
{
    
                       $row=mysql_fetch_array(mysql_query("SELECT * FROM ticket WHERE id='".$_GET['id']."' ORDER  BY abs(id) DESC"));
        
?>




                               <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            
                            <div class="card-block">      
                                <form method="POST" action="modify-employee.php">
                                    <div class="form-body">
                                        <h3 class="card-title">Tickets</h3>
                                        <hr>
                                        
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text" name="subject" value="<?php echo $row['subject']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <label>Message</label>
                                                    <textarea name="message" rows="15" placeholder="<?php echo $row['message']; ?>" class="form-control" rows="15" readonly ></textarea>
                                                    
                                                </div>
                                            </div>
                                            <!--/span-->
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