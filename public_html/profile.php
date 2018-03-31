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



if( isset($_POST['name']) )
     {
         
         
         $target_dir = "user_uploads/";
//$file_data = explode(basename($_FILES["fileToUpload"]["name"]));
$username="$myusername";

$target_file = $target_dir .$username.".jpg" ;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
/*if(isset($_POST["name"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
}
*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    
    echo "<script type='text/javascript'>
              alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
              </script>";
              echo"<script type='text/javascript'>
     window.location.href='profile.php';
     </script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
    {
    
    echo "<script type='text/javascript'>
              alert('Sorry, your file was not uploaded.');
              </script>";
              echo"<script type='text/javascript'>
     window.location.href='profile.php';
     </script>";
// if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        
        
    } else {
        echo "<script type='text/javascript'>
              alert('Sorry, there was an error uploading your file.');
              </script>";
              echo"<script type='text/javascript'>
     window.location.href='profile.php';
     </script>";
        
    }
}

         
         
          if($_POST['name']=='' || $_POST['dob']=='' || $_POST['gender']=='' || $_POST['city']=='' || $_POST['street']=='' || $_POST['state']=='' || $_POST['mobile']=='' || $_POST['email']=='' || $_POST['pcode']=='')
          {
              echo "<script type='text/javascript'>
              alert('Looks like that you had left any blank field');
              </script>"; 
          }
          else
          {
               mysql_query("UPDATE admin SET name='".$_POST['name']."', mobile='".$_POST['mobile']."', email='".$_POST['email']."', street='".$_POST['street']."', city='".$_POST['city']."',state='".$_POST['state']."', pcode='".$_POST['pcode']."' where id='".$_POST['id']."'");
              echo "<script type='text/javascript'>
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
    <title><?php echo $sitename; ?> | Profile Page</title>
<?php include 'header.php'; ?>

        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <?php
                       $row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$myusername."'"));
                ?>
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View And Edit Profile</h4>
                            </div>
                            <div class="card-block">
                                <form method="POST" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-body">
                                        <h3 class="card-title">Person Info</h3>
                                        <hr>
                                        
                                      
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    
                                                 <center>   
                                                   <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="u-img"><img src="<?php echo $row['img']; ?>/<?php echo $row['username']; ?>.jpg" style="width:100%" alt="user"></div>
                                                   <br>
                                                  
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
                                                   
                                                    
            
                                                </div>
                                            </div> </center>
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
                                                    <input type="text" name="salary" value="<?php echo $row['salary']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    

                                                   <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" readonly>
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
                                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
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