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
    <title><?php echo $sitename; ?> | Add Notification</title>
    
    
    
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Notification</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Notification</li>
                            <li class="breadcrumb-item active">Add Notification</li>
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
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Notification</h4>
                            </div>
                            <div class="card-block">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        
                                        <div class="form-body">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" value="" class="form-control" placeholder="Title Here!!" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea rows="12" cols="50" name="content" class="form-control" placeholder="Write your Content Here.." required></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <div class="form-actions">
                                        <button type="submit" name="add" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                                        <button type="button" name="clear" class="btn btn-inverse">Clear</button>
                                    </div>
                                </form>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    
                                </div>
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