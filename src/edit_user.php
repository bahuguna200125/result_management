<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="style.css"/>
    
</head>
<body>

<?php
$user_id = $_POST['user_id'];
            $user_query = "SELECT * FROM user WHERE user_id = $user_id";
            $user = $conn->query($user_query);
            if ($user->num_rows > 0) {

                echo "<h2>USER DATA</h2>";
                while ($row = $user->fetch_assoc()) {
                    $fname=$row['fname']; 
                    $lname= $row['lname']; 
                    $email = $row['mail'];
                      $user_id = $row['user_id'];
                   $phone_no=  $row['phone_no']; 
                    $pass= $row['password']; 
                  //   echo $fname;
                  //   echo $lname;
                  //   echo $email;
                  //   echo $phone_no;
                  //   echo $pass;
          
                ?>      
           


                               
<form method="post" action="" id="form2">
        <label for="fname" ><h4>FIRST NAME</h4></label>
        <input type="text" id="fname" name="fname" placeholder="FIRST NAME" value=" <?php echo $fname;?>"><br>
        <div id="fname_info"></div>
        <label for="lname" ><h4>LAST NAME</h4></label>
        <input type="text" id="lname" name="lname" placeholder="LAST NAME" value=" <?php echo $lname;?>  "><br>
        <div id="lname_info"></div>
       <label for="mail"><h4>ENTER YOUR MAIL ID</h4> </label>
       <input type="email" id="mail" name="mail" placeholder="@gmail.com" value="<?php echo $email;?>"><br>
       <div id="mail_info"></div>
       <label for="phone"><h4>PHONE NUMBER</h4></label>
       <input type="number" id="phone" name="phone" placeholder="CONTACT INFO" value="<?php echo $phone_no;?>"><br>
       <div id="phone_info"></div>
       <label for="cpass"><h4>CREATE PASSWORD</h4></label>
       <input type="password" id="cpass" name="cpass" placeholder="CREATE PASSWORD" value="<?php echo $pass;?>"><br>
       <div id="cpass_info"></div>
       <label for="conpass"><h4>CONFIRM PASSWORD</h4></label>
       <input type="password" id="conpass" name="conpass" placeholder="CONFIRM PASSWORD" value="<?php echo $pass;?>"><br><br>
       <div id="conpass_info"></div>
       <div id="samepass_info"></div>
       <input type="submit"  id="submit" onclick="myFunction();" name="submit" value="submit">
    </form> 
    

    <?php
    }
}
?>
</body>
</html>