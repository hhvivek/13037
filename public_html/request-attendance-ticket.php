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


if( isset($_POST['submit']) )
     { 
            if($_POST['subject']=='' || $_POST['message']=='')
          {
              echo "<script type='text/javascript'>
              alert('Looks like that you had left any blank field');
              </script>"; 
          }
          else
          {
              mysql_query("INSERT INTO `ticket` (`id`, `subject`, `username`, `message`) VALUES (NULL,'".$_POST['subject']."', '".$myusername."', '".$_POST['message']."');");
              echo "<script type='text/javascript'>
              alert('Ticket Submited');
              </script>";
          }
     }
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Compose Email</title>
<?php include 'header.php'; ?>

        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Compose Email</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Email App</li>
                        </ol>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Email</h4>
                            </div>
                            <div class="card-block">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                
                                <div class="col-xlg-10 col-lg-8 col-md-8">
                                    <div class="card-block">
                                        <h3 class="card-title">Compose New Message</h3>
                                        
                                        
                                        
                                        
                                        <div class="form-group">
                                            
                                           
                                        </div>
                                        <div class="form-group">
                                            <input name="subject" class="form-control" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                                        </div>
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <br>
                    

                                        <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Send</button>
                                        
                                    </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
               
            </div>
           
<?php include 'footer.php'; ?>