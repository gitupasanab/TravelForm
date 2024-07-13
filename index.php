<?php
$insert = false;
if(isset($_POST['name'])){
  $submit = true;
  $server = "localhost:3307";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);

  if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());

  }
 // echo "Success connecting to the db";

 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $desc = $_POST['desc'];
 $sql ="INSERT INTO 'collegetrip'.`trip` (`SerialNo`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name',
  '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
 //echo $sql;

 if($con->query($sql)==true){
   // echo "Successfully inserted";
   $insert = true;
 }
 else{
    echo"ERROR: $sql <br> $con->error";
   
 }

 $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg"src="bv.webp"alt="Banasthali Vidyapith">
    <div class="container">
        <h1>Welcome to Banasthali Vidyapith US trip form</h1>
        <p>Enter your details and submit this form to confirm your paritcipation in the trip</p>

        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        
        ?>
        <form action="index.php"method="post">
             <input type="text" name="name" id="name" placeholder="Enter your name">
             <input type="text" name="gender" id="gender" placeholder="Enter your gender">
             <input type="text" name="age" id="age" placeholder="Enter your age">
             <input type="email" name="email" id="email" placeholder="Enter your email">
             <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
             <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
             placeholder="Enter any other information here"></textarea>
             <button class="btn">Submit</button>
             
        </form>
              

    </div>
    <script src="index.js"></script>
    
    
</body>
</html>