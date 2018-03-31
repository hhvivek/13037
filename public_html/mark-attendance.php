<?php 
session_start();
date_default_timezone_set("Asia/Kolkata");
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
    <title><?php echo $sitename; ?> | Mark Attendance</title>
<?php include 'header.php'; ?>
<style>
body{
	background-color:teal;
}
button{border-radius:25px;
	border: none;

	margin:-10% 0% 0% 4%;
	height:10%;
	width:20%;
}
p{ text-align:center;
 margin:2% 0% 0% 30%;
	display:none;
	height:40%;
	width:40%;
	background-color:white;
	border-radius: 25px;
	padding: 2%;

}
#third{
	border-radius:25px;
	border: none;
	
	margin:20% 0% 0% 39%;
	height:10%;
	width:20%;
}


#map,#my_camera{
    display:none;
}

</style>


<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
        width: 90%;
      }
      /* Optional: Makes the sample page fill the window. 
      html, body {
        height: 100%;
        
        margin: 0;
        padding: 0;
      }*/
</style>
<script>
	function myFunction1()
	{   document.getElementById('third').style.display="none";
		document.getElementById('first').style.display="block";
		document.getElementById('map').style.display="block";
		document.getElementById('second').style.display="none";
		document.getElementById('my_camera').style.display="block";
	

	
	
	}
		function myFunction2()
	{   
		document.getElementById('second').style.display="block";
		document.getElementById('my_camera').style.display="block";
		
	//	document.getElementById('map').style.display="none";
		document.getElementById('first').style.display="none";
		document.getElementById('third').style.display="none";
	
	    $.ajax({
		    url:"//thelstera.com/api/logout.php",
		    type:"POST",
		    data:{myusername:"<?php echo $row['username']; ?>",cin:"<?php echo urlencode(date('Y-m-d H:i:s')); ?>"},
		    error:function(){
		        alert("Failed, check internet connection");
		    },
		    success:function(res){
		        console.log("Ticket has been submitted");
		    }
		});
	    
	}
	

</script>

        <div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Mark Attendance</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Mark Attendance</li>
                        </ol>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                     
                        
                                
                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Mark Attendance</h4>
                            </div>
                            <div class="card-block">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div id="my_camera" class="form-group">
                                                    
                                                    
                                                            </div>
                                                    </div>
                                            <!--/span-->
                                                    <div class="col-md-6">
                                                            <div id="map" class="form-group">
                                                    
                                                            </div>
                                                    </div>
                                            <!--/span-->
                                            </div>  
        
                                        
                                        
                                        <button type="button" onclick="myFunction1()" name="submit" id="third" class="btn btn-success"> <i class="fa fa-check"></i>MARK ATTENDANCE</button>
	                                    <div class="main"> 

                                            <form method="POST" action"">
                                    

                                         	        <p id="first" >
     	         
                                         	        <?php $date_clicked = date('Y-m-d H:i:s');;
                                                         echo "Check in Time " . $date_clicked . "<br>"; ?>
     	
                                         	        <br><br>
                                                        	<button type="button" onclick="myFunction2()" name="submit" class="btn btn-success" style="width:50%;"> <i class="fa fa-check"></i>MARK OUT</button>
                                                    </p>
            
                                            </form>
       
                                            <form method="POST"><p id="second">
        
                                            	MARK Out TIME Recorded<br>
     	
     	
                                            </p>
     
  </form>
  </div>
                                        
                                        
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
            </div>
           
            
            
    <script>
      
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 10
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
      


      
      
    </script>
    
    <script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxPypxXIDCJo8OZOX2Xh2sljF30acnST8&callback=initMap">
    </script>

<?php include 'footer.php'; ?>
