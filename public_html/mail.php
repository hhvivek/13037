<?php 
if(isset($_POST['submit']))
    {
    $to = $_POST['email']; // this is the reciver's Email address
    $from = "email@example.com"; // this is your Email address
    $subject = "Form submission";
    $message = $_POST['message'];
    

    $headers = "From:" . $from;
    $headers2 = "To:" . $to;
    mail($to,$from,$subject,$message,$headers,$headers2);
    echo "<script type='text/javascript'>
              alert('Mail Sent');
              </script>"; 
    
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>