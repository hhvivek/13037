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
 
if(isset($_POST['submit']))
    {
    $to = $_POST['email']; // this is the reciver's Email address
    $from = "email@example.com"; // this is your Email address
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    $headers = "From:" . $from;
    $headers2 = "To:" . $to;
    mail($to,$from,$subject,$message,$headers,$headers2);
    echo "<script>
              alert('Mail Sent');
              </script>"; 
    
    }
?>
<!DOCTYPE html>
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
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                
                                <div class="col-xlg-10 col-lg-8 col-md-8">
                                    <div class="card-block">
                                        <h3 class="card-title">Compose New Message</h3>
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="dropzone">
                                        <div class="form-group">
                                            
                                            <input name="email" class="form-control" placeholder="To:">
                                        </div>
                                        <div class="form-group">
                                            <input name="subject" class="form-control" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                                        </div>
                                        
                                        
                                            
                                        </form>
                                        <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
                                        <button class="btn btn-inverse m-t-20"><i class="fa fa-times"></i> Discard</button>
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